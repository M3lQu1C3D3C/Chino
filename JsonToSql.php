<?php
    class JsonToMariaDB
    {
        private $db_host; // Ubicacíón del host.
        private $db_name; // Nombre de la base de datos.
        private $db_user; // Nombre del usuario.
        private $db_pass; // Contraseña.
        private $tabl_nam; // Nombre de la tabla.
        private $nam_json; // Nombre del archivo json.
        function __construct($db_host, $db_name, $db_user, $db_pass, $tabl_nam, $nam_json)
        {
            $this->db_host = $db_host;
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
            $this->tabl_nam = $tabl_nam;
            $this->nam_json = $nam_json;
            // Conección a la base de datos.
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass);
            $this->mysqli->select_db($this->db_name);
            // Abrir el archivo JSON.
            $this->file = fopen($this->nam_json, "r");
            $this->file_size = filesize($this->nam_json);
            $this->file_text = fread($this->file, $this->file_size);
            fclose($this->file);
            // Almacenamiento de los datos del archivo JSON al objeto: $this->obj.
            $this->obj = json_decode($this->file_text, true);
        }

        function insert() // Esta función solo inserta valores a la tabla: $this->tabl_nam.
        {
            $i = 0;
            $general = array();
            while ($i <= count($this->obj) - 1) // Cuenta la cantidad de filas de la tabla en el JSON
            {
                $valores = array();
                $nam_col = array();
                foreach ($this->obj[$i] as $key => $value) { // Recorre cada columna de cada fila
                        array_push($valores, "'".$value."'");
                        if($i == 0){array_push($nam_col, $key);}
                    }
                $row = "(".implode(",", $valores).")";
                if($i == 0){$col = "(".implode(",", $nam_col).")";}
                array_push($general, $row); // Matriz de todas los item a insertar en la tabla. 
                unset($row, $valores);
                $i++;
            }
            $query =  implode(",", $general); // Concatena la Matriz: ( ), ( ), ...
            $query = "INSERT INTO ".$this->tabl_nam." ".$col." VALUES ".$query; // Arma el comando de la insertación
            $result = $this->mysqli->query($query); // Ejecuta la insertación
            $this->mysqli->close(); 
        }

        
    }
?>

