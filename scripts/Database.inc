<?php

class Database { 
        /*
    var $servername = "localhost";
    var $username = "root";
    var $password = "root";
    var $dbname = "heroesblackbook";
    */
    var $servername = "cloud79.hostgator.com";
    var $username = "g2v9q3j1_Patrick";
    var $password = "dogfunk19";
    var $dbname = "g2v9q3j1_heroesblackbook";

    function Database() {
    }
    
    function login($username, $password) {
        $conn = new PDO("mysql:host=" . $this->servername . 
                        ";dbname=" . $this->dbname, 
                        $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
        $cmd = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        
        $stmt = $conn->prepare($cmd);
        $stmt->execute();
        $result = $stmt->fetch();
        
        return $result;
    }
    
    function getHeroList() {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $stmt = $conn->prepare("SELECT id, name, icon FROM heroes order by name");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function getHero($heroid){
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            foreach ($conn->query("SELECT * FROM heroes WHERE id = '" . $heroid . "'") as $results) {
                return $results;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function getHeroByBuildId($buildid){
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $cmd = "SELECT * from heroes where id = (SELECT heroid from builds where id = $buildid)";
            foreach ($conn->query($cmd) as $results) {
                return $results;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function getHeroAbilities($heroid){
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $stmt = $conn->prepare("SELECT * FROM abilities WHERE heroid = '" . $heroid . "' order by orderindex");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function getHeroTalents($heroid){
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $stmt = $conn->prepare("SELECT level, name, description, icon FROM talents WHERE heroid = '$heroid' ORDER BY level");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function getHeroTalentsByLevel($heroid, $level){
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $stmt = $conn->prepare("SELECT level, id, name, description, icon FROM talents WHERE heroid = '".
                        $heroid . "' and level = '" . $level . "' ORDER BY level");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function getLevels($heroid) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT level FROM talents WHERE heroid = '" . 
                    $heroid . "' GROUP BY level ORDER BY level");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function createUser($user) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $cmd = "INSERT INTO users (" .
                "name, username, email, password) values ('" .
                $user->name . "','" .
                $user->username . "','" .
                $user->email . "','" .
                $user->password . "')";

            $stmt = $conn->prepare($cmd);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return false;
    }
    
    function saveBuild($build) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $cmd = "INSERT INTO builds (heroid, userid, name, 
                    level1, level4, level7, level10,
                    level13, level16, level20) values ('" .
                    $build->heroid . "','" .
                    $build->userid . "','" .
                    $build->name . "','" .
                    $build->level1 . "','" .
                    $build->level4 . "','" .
                    $build->level7 . "','" .
                    $build->level10 . "','" .
                    $build->level13 . "','" .
                    $build->level16 . "','" .
                    $build->level20 . "')";

            $stmt = $conn->prepare($cmd);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return false;
    }
    
    function deleteBuild($build) {
        try {
            echo "1";
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            echo "2";
            echo "$build";
            $cmd = "DELETE FROM builds WHERE ID = " . $build;
            
            echo "3";
            echo $cmd;

            echo "4";
            $stmt = $conn->prepare($cmd);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return false;
    }
    
    function getBuildsByUser($userid) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT * FROM `builds` WHERE userid = '$userid' ORDER BY heroid");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function getBuildById($buildid) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $cmd = "SELECT * FROM `builds` where id = $buildid";
            foreach ($conn->query($cmd) as $results) {
                return $results;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
    
    function uploadhero($hero) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $cmd = "INSERT INTO heroes (" .
                "id, name, attributeid, description, difficulty, franchise, gender, icon, releaseDate, role, title, type) values ('" .
                $hero->id . "','" .
                str_replace("'","''",$hero->name) . "','" .
                $hero->attributeid . "','" .
                str_replace("'","''",$hero->description) . "','" .
                $hero->difficulty . "','" .
                $hero->franchise . "','" .
                $hero->gender . "','" .
                $hero->icon . "','" .
                $hero->releaseDate . "','" .
                $hero->role . "','" .
                str_replace("'","''",$hero->title) . "','" .
                $hero->type . "')";
            echo $cmd;
            $stmt = $conn->prepare($cmd);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return false;
    }
    
    function uploadAbility($ability) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $cmd = "DELETE FROM heroes WHERE id = '" . $ability->id . "'; INSERT INTO abilities (" .
                "id, heroid, hero, name, description, icon, cooldown, manaCost, shortcut) values ('" .
                $ability->id . "','" .
                $ability->heroid . "','" .
                $ability->hero . "','" .
                str_replace("'","''",$ability->name) . "','" .
                str_replace("'","''",$ability->description) . "','" .
                $ability->icon . "'," .
                $ability->cooldown . "," .
                $ability->manacost . ",'" .
                $ability->shortcut . "')";
       
            $stmt = $conn->prepare($cmd);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return false;
    }
    
    function uploadTalent($talent) {
        try {
            $conn = new PDO("mysql:host=" . $this->servername . 
                            ";dbname=" . $this->dbname, 
                            $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $cmd = "INSERT INTO talents (" .
                "id, heroid, name, description, icon, level, cooldown) values ('" .
                $talent->id . "','" .
                $talent->heroid . "','" .
                str_replace("'","''",$talent->name) . "','" .
                str_replace("'","''",$talent->description) . "','" .
                $talent->icon . "'," .
                $talent->level . "," .
                $talent->cooldown . ")";
                
            try {
                $stmt = $conn->prepare($cmd);
                $stmt->execute();
            } catch (PDOException $e) {
                echo $cmd . "<br />";
                echo "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            
            $conn = null;
            return true;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } catch(Exception $ex) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return false;
    }
    
    function cleardb() {
        $conn = new PDO("mysql:host=localhost;dbname=heroesblackbook", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
        $cmd = "DELETE FROM heroesblackbook.heroes;";
        $stmt = $conn->prepare($cmd);
        $stmt->execute();
        
        $cmd = "DELETE FROM heroesblackbook.abilities;";
        $stmt = $conn->prepare($cmd);
        //$stmt->execute();
        
        $cmd = "DELETE FROM heroesblackbook.talents;";
        $stmt = $conn->prepare($cmd);
        //$stmt->execute();
    }
}

?>