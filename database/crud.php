<?php
include 'connection.php';

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

    $sql = "DELETE FROM $table WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }

}
