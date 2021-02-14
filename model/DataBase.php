<?php

class DataBase {
    private $db;

    public function __construct($dbname="parc_info", $pwd="")
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=".$dbname, "root", $pwd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }

    public function getDb(){return $this->db;}

    public function connexion($pseudo, $password)
    {
        try {
            $req = $this->getDb()->prepare('SELECT * FROM utilisateurs
                                        WHERE password = :password AND pseudo = :pseudo');
            $req->execute([
                'password' => $password, 
                'pseudo' =>$pseudo
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function inscription($email, $pseudo, $password)
    {
        try {
            $req = $this->getDb()->prepare('INSERT INTO utilisateurs 
                                    VALUES(null, :pseudo, :email, :password, 1, NOW())');
            $result = $req->execute([
                'pseudo' =>$pseudo,
                'email' =>$email,
                'password' => $password 
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return (bool) $result;
    }

    public function listProducts()
    {
        try {
            $req = $this->getDb()->prepare('SELECT * FROM mytable ORDER BY id DESC');
            $req->execute([]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProduct($id)
    {
        try {
            $req = $this->getDb()->prepare('SELECT * FROM mytable WHERE id = ?');
            $req->execute([$id]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function deleteProduct($id)
    {
        try {
            $req = $this->getDb()->prepare('DELETE FROM mytable WHERE id =:id');
            $result = $req->execute(['id'=>$id]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return (bool) $result;
    }

    public function editProduct($id, $culture, $codeculture, $departement, $codedepartement, $type, $superficie, $annee, $rendement, $production)
    {
        try {
            $req = $this->getDb()->prepare('UPDATE mytable 
                                SET annee =:annee, codedepartement =:codedepartement, departement =:departement, codeculture =:codeculture, culture =:culture, type =:type, superficie =:superficie, rendement =:rendement, production =:production 
                                WHERE id =:id');
            $result = $req->execute([
                'annee' =>$annee,
                'codedepartement' =>$codedepartement,
                'departement' => $departement ,
                'codeculture' => $codeculture ,
                'culture' => $culture,
                'type' => $type,
                'superficie' => $superficie,
                'rendement' => $rendement,
                'production' => $production,
                'id'=>$id
                ]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return (bool) $result;
    }

    public function addProduct($culture, $codeculture, $departement, $codedepartement, $type, $superficie, $annee, $rendement, $production)
    {
        try {
            $req = $this->getDb()->prepare('INSERT INTO mytable 
                                    VALUES(null, :annee, :codedepartement, :departement, :codeculture, :culture, :type, :superficie, :rendement, :production)');
            $result = $req->execute([
                'annee' =>$annee,
                'codedepartement' =>$codedepartement,
                'departement' => $departement ,
                'codeculture' => $codeculture ,
                'culture' => $culture,
                'type' => $type,
                'superficie' => $superficie,
                'rendement' => $rendement,
                'production' => $production
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return (bool) $result;
    }

    public function getCodesDepartement()
    {
        try {
            $req = $this->getDb()->prepare('SELECT distinct codedepartement, departement 
                                        FROM mytable
                                        ORDER BY codedepartement ASC');
            $req->execute([]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCodesTypeCulture()
    {
        try {
            $req = $this->getDb()->prepare('SELECT distinct codetypeculture, type 
                                        FROM mytable
                                        ORDER BY codetypeculture ASC');
            $req->execute([]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCodesCulture()
    {
        try {
            $req = $this->getDb()->prepare('SELECT distinct codeculture, culture 
                                        FROM mytable
                                        ORDER BY codeculture ASC');
            $req->execute([]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductsByDateBetween($datedepart, $datefin)
    {
        try {
            $req = $this->getDb()->prepare('SELECT * 
                                        FROM mytable
                                        WHERE annee >= :datedepart AND annee < :datefin
                                        ORDER BY annee ASC');
            $req->execute([
                'datedepart' => $datedepart,
                'datefin' => $datefin
            ]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserByPassword($password)
    {
        try {
            $req = $this->getDb()->prepare('SELECT * 
                                        FROM utilisateurs
                                        WHERE password = :password');
            $req->execute([
                'password' => $password
            ]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $req->rowCount();
    }

    public function changePassword($id, $password)
    {
        try {
            $req = $this->getDb()->prepare('UPDATE utilisateurs
                                        SET password =:password
                                        WHERE id =:id');
            $result = $req->execute([
                'id' => $id,
                'password' => $password
            ]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return (bool) $result;
    }

}