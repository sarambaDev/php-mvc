<?php
function getAllEmployees($conn) {
    return mysqli_query($conn, "SELECT * FROM employees ORDER BY id DESC");
}

function addEmployee($conn, $name, $position, $salary) {
    $stmt = $conn->prepare(
        "INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("ssd", $name, $position, $salary);
    return $stmt->execute();
}

function getEmployeeById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM employees WHERE id=? LIMIT 1");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateEmployee($conn, $id, $name, $position, $salary) {
    $stmt = $conn->prepare(
        "UPDATE employees SET name=?, position=?, salary=? WHERE id=?"
    );
    $stmt->bind_param("ssdi", $name, $position, $salary, $id);
    return $stmt->execute();
}

function deleteEmployee($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM employees WHERE id=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
