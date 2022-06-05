<?php
    require_once "db.php";

    function add_news($id_staff, $name, $image, $summary, $content, $id_category) {
        $sql = 'INSERT INTO news(id_staff, name, image, summary, content, id_news_category) 
                VALUES(?, ?, ?, ?, ?, ?) 
        ';
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('issssi', $id_staff, $name, $image, $summary, $content, $id_category);
        
        $stm->execute();

        return ($stm->affected_rows == 1) ? $stm->insert_id : -1;
    }
    
    function read_all_news() {
        $sql = 'SELECT * FROM news';

        $conn = get_connection();
        $result = $conn->query($sql);
        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function read_news_by_id($id) {
        $sql = "SELECT * FROM news WHERE id=?";
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function read_news_by_title($title) {
        $sql = "SELECT * FROM news WHERE tennews LIKE CONCAT('%',?,'%')";
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param("s", $title);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function read_news_by_id_category($id_category) {
        $sql = "SELECT * FROM news WHERE id_news_category = ?";
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param("i", $id_category);
        $stm->execute();
        $output = [];
        $result = $stm->get_result();
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }

    function update_news($news_id, $news_name, $image, $summary, $content, $category_id) { 
        $sql = "UPDATE news SET NAME = ?,IMAGE = ?,SUMMARY = ?,CONTENT = ?, ID_NEWS_CATEGORY=? WHERE ID = ?";

        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssii', $news_name, $image, $summary, $content,$category_id,$news_id);
        $stm->execute();
        return $stm->affected_rows == 1;
    }

    function delete_news($id) {
        $sql = "DELETE FROM news WHERE id = ?";
        $conn = get_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('i', $id);
        
        $stm->execute();
        
        return ;
    }

    function read_random_news() {
        $sql = "SELECT * FROM news ORDER BY RAND() LIMIT 5";

        $conn = get_connection();
        $result = $conn->query($sql);
        $output = [];
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        
        return $output;
    }
?>