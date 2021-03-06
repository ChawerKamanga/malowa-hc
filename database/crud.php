<?php
include 'connection.php';

function countChildren($id)
{
    global $conn;

    $sql = 'SELECT COUNT(under_five_children.id) as total_children FROM under_five_children, visits 
        WHERE under_five_children.id=? && visits.child_id=?;';
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $id);    
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    return $result;
}

function countParentChild($id)
{
    global $conn;
    $sql = 'SELECT COUNT(under_five_children.id) as total_children FROM under_five_children, parents
    WHERE under_five_children.parent_id=? && parents.id=?;';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $id);    
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    return $result;    
}

// Get Functions
function get1($id, $table)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);    
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    return $result;
}

function getField($field, $value, $table)
{
    global $conn;

    $sql = "SELECT * FROM $table WHERE $field=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $value);    
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    return $result;
}

function get2($field1, $field2, $table)
{
    global $conn;

    $sql = "SELECT $field1, $field2 FROM $table";

    $result = $conn->query($sql);

    return $result;
}


function getAll($table)
{
    global $conn;

    $sql = "SELECT * FROM $table";

    $result = $conn->query($sql);

    return $result;
}

function getChildren(){
    global $conn;

    $sql = 'SELECT under_five_children.id, under_five_children.firstname, under_five_children.lastname, 
    under_five_children.gender, date_of_birth, parents.firstname as parent_firstname, parents.lastname as parent_lastname
    FROM under_five_children, parents WHERE parent_id = parents.id;';

    $result = $conn->query($sql);

    return $result;
}

function getVisits()
{
    global $conn;

    $sql = 'SELECT vaccines.vaccine_name, under_five_children.firstname, under_five_children.lastname, visits.date_of_visit, visits.id
    FROM vaccines, under_five_children, visits
    WHERE vaccine_id = vaccines.id && child_id = under_five_children.id;';

    $result = $conn->query($sql);

    return $result;
}

function update2ssi($column1, $column2,   $value1, $value2,  $id,$table)
{
    global $conn;

    $sql = "UPDATE $table 
            SET $column1=?, $column2=?
            WHERE id=?";

     $stmt = $conn->prepare($sql);
     $stmt->bind_param("ssi", $value1, $value2, $id);    

    if ($stmt->execute() === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

function update2($column1, $column2,   $value1, $value2,  $id,$table)
{
    global $conn;

    $sql = "UPDATE $table 
            SET $column1=?, $column2=?
            WHERE id=?";

     $stmt = $conn->prepare($sql);
     $stmt->bind_param("sii", $value1, $value2, $id);    

    if ($stmt->execute() === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}


function update3($column1, $column2, $column3,   $value1, $value2, $value3,  $id, $table)
{
    global $conn;

    $sql = "UPDATE $table 
            SET $column1=?, $column2=?, $column3=?
            WHERE id=?";

     $stmt = $conn->prepare($sql);
     $stmt->bind_param("sssi", $value1, $value2, $value3,$id);    

    if ($stmt->execute() === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

// Update functions 
function update5($column1, $column2, $column3, $column4, $column5,  $value1, $value2, $value3, $value4, $value5, $id,$table)
{
    global $conn;

    $sql = "UPDATE $table 
            SET $column1='$value1', $column2='$value2', $column3='$value3', $column4='$value4', $column5='$value5'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

// Create functions
function save2($column1, $column2,  $value1, $value2, $table)
{
    global $conn;

    $sql = "INSERT INTO $table ($column1, $column2)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $value1, $value2);    

    if ($stmt->execute() === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

function saveiis($column1, $column2, $column3,  $value1, $value2, $value3, $table)
{
    global $conn;

    $sql = "INSERT INTO $table ($column1, $column2, $column3)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $value1, $value2, $value3);    

    if ($stmt->execute() === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

function save3($column1, $column2, $column3,  $value1, $value2, $value3, $table)
{
    global $conn;

    $sql = "INSERT INTO $table ($column1, $column2, $column3)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $value1, $value2, $value3);    

    if ($stmt->execute() === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

function save4($column1, $column2, $column3, $column4,  $value1, $value2, $value3, $value4, $table)
{
    global $conn;

    $sql = "INSERT INTO $table ($column1, $column2, $column3, $column4)
            VALUES ('$value1', '$value2', '$value3', '$value4')";


    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

function save5($column1, $column2, $column3, $column4, $column5,  $value1, $value2, $value3, $value4, $value5, $table)
{
    global $conn;

    $sql = "INSERT INTO $table ($column1, $column2, $column3, $column4, $column5)
            VALUES ('$value1', '$value2', '$value3', '$value4', '$value5')";


    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
        return false;
    }
}

// delete functions
function delete($id, $table)
{
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);  

    if ($stmt->execute() === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}
