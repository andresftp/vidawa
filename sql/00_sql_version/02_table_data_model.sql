--Tabla proceso
CREATE TABLE `pro_proceso` (`pro_id` int(11) NOT NULL, `pro_prefijo` varchar(20) NOT NULL, `pro_nombre` varchar(60) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `pro_proceso` (`pro_id`, `pro_prefijo`, `pro_nombre`) VALUES
(1, 'ING', 'Ingeniería'),
(2, 'MAR', 'Marketing'),
(3, 'CON', 'Contabilidad'),
(4, 'DIS', 'Diseño'),
(5, 'OPE', 'Operativos');
ALTER TABLE `pro_proceso`
    ADD PRIMARY KEY (`pro_id`);
ALTER TABLE `pro_proceso`
    MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

---- Tabla tipo documento
CREATE TABLE `tip_tipo_doc` (
                                `tip_id` int(11) NOT NULL,
                                `tip_nombre` varchar(60) NOT NULL,
                                `tip_prefijo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `tip_tipo_doc` (`tip_id`, `tip_nombre`, `tip_prefijo`) VALUES
(1, 'Instructivo', 'INS'),
(2, 'Presupuesto', 'PPTO'),
(3, 'Factura', 'FACT'),
(4, 'Recibo', 'RCB'),
(5, 'Cuenta', 'CTA');
ALTER TABLE `tip_tipo_doc`
    ADD PRIMARY KEY (`tip_id`);
ALTER TABLE `tip_tipo_doc`
    MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

----------- Tabla documento
CREATE TABLE `doc_documento` (
                                 `doc_id` int(11) NOT NULL,
                                 `doc_nombre` varchar(60) NOT NULL,
                                 `doc_codigo` varchar(60) NOT NULL,
                                 `doc_contenido` varchar(4000) NOT NULL,
                                 `doc_id_tipo` int(11) NOT NULL,
                                 `doc_id_proceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `doc_documento`
    ADD PRIMARY KEY (`doc_id`),
  ADD KEY `doc_tipo_idx` (`doc_id_tipo`),
  ADD KEY `doc_proceso_idx` (`doc_id_proceso`);

ALTER TABLE `doc_documento`
    MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `doc_documento`
    ADD CONSTRAINT `doc_documento_ibfk_1` FOREIGN KEY (`doc_id_tipo`) REFERENCES `tip_tipo_doc` (`tip_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `doc_documento_ibfk_2` FOREIGN KEY (`doc_id_proceso`) REFERENCES `pro_proceso` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;