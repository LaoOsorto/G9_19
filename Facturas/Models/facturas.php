<?php

    class Facturas extends Conectar{

        public function get_facturas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas WHERE estado = 'F'";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_facturas_anuladas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas WHERE estado = 'A'";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_facturas_todas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_factura($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas WHERE id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_facturas($ID,$NUMERO_FACTURA,$ID_SOCIO,$FECHA_FACTURA,$DETALLE,$SUB_TOTAL,$TOTAL_ISV,$TOTAL,$FECHA_VENCIMIENTO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_facturas(ID,NUMERO_FACTURA,ID_SOCIO,FECHA_FACTURA,DETALLE,SUB_TOTAL,TOTAL_ISV,
            TOTAL,FECHA_VENCIMIENTO, ESTADO)
            VALUES (?,?,?,?,?,?,?,?,?,'F');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->bindValue(2, $NUMERO_FACTURA);
            $sql->bindValue(3, $ID_SOCIO);
            $sql->bindValue(4, $FECHA_FACTURA);
            $sql->bindValue(5, $DETALLE);
            $sql->bindValue(6, $SUB_TOTAL);
            $sql->bindValue(7, $TOTAL_ISV);
            $sql->bindValue(8, $TOTAL);
            $sql->bindValue(9, $FECHA_VENCIMIENTO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_factura($numero_factura){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_facturas WHERE numero_factura = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numero_factura);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_detalle_factura($valor,$id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_facturas SET detalle = ? WHERE id = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_estado_factura($valor,$id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_facturas SET estado = ? WHERE id = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>