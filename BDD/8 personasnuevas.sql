use ignug;
INSERT INTO Persona (id, identificacion, nombre1, nombre2, apellido1, apellido2, fechaNacimiento, telefonoCelular, correoElectronicoInstitucional, idGenero) VALUE ('633','1707382204', 'Gorky', 'Francisco', 'Estrella', 'Sotomayor', '1971-10-27', '0996603946', 'gestrella@yavirac.edu.ec', '1');
INSERT INTO `Cuenta` (`id`, `idRol`, `idPersona`) VALUES(474, 4, 633);