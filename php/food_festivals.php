<?php
// This file handles food festival database operations
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

function getFoodFestivals() {
    global $pdo;
    global $error;
    try {
        $stmt = $pdo->query("
            SELECT * FROM food_festivals 
            WHERE festival_date >= CURRENT_DATE 
            ORDER BY featured DESC, festival_date ASC
        ");
        if ($stmt === false) {
            throw new PDOException("Query execution failed");
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new PDOException("Fetch failed");
        }
        return $result;
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
        error_log("Error in getFoodFestivals: " . $e->getMessage());
        return [];
    } catch (Exception $e) {
        $error = "An unexpected error occurred";
        error_log("Unexpected error in getFoodFestivals: " . $e->getMessage());
        return [];
    }
}

function addFoodFestival($data) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            INSERT INTO food_festivals (
                title, description, venue, festival_date, 
                start_time, end_time, entry_fee, image, 
                featured, cuisines, status
            ) VALUES (
                :title, :description, :venue, :festival_date,
                :start_time, :end_time, :entry_fee, :image,
                :featured, :cuisines, :status
            )
        ");
        return $stmt->execute($data);
    } catch (PDOException $e) {
        error_log("Error in addFoodFestival: " . $e->getMessage());
        return false;
    }
}

function updateFoodFestival($id, $data) {
    global $pdo;
    try {
        $sql = "UPDATE food_festivals SET ";
        $params = [];
        foreach ($data as $key => $value) {
            $sql .= "$key = :$key, ";
            $params[$key] = $value;
        }
        $sql = rtrim($sql, ", ") . " WHERE id = :id";
        $params['id'] = $id;

        $stmt = $pdo->prepare($sql);
        return $stmt->execute($params);
    } catch (PDOException $e) {
        error_log("Error in updateFoodFestival: " . $e->getMessage());
        return false;
    }
}

function deleteFoodFestival($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM food_festivals WHERE id = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        error_log("Error in deleteFoodFestival: " . $e->getMessage());
        return false;
    }
}