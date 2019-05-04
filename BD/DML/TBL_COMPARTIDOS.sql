ALTER TABLE DRIVE.TBL_COMPARTIDOS DISABLE CONSTRAINT COM_TIP_COM_FK;
ALTER TABLE DRIVE.TBL_COMPARTIDOS DISABLE CONSTRAINT COM_CAR_FK;
ALTER TABLE DRIVE.TBL_COMPARTIDOS DISABLE CONSTRAINT COM_ARC_FKv2;
ALTER TABLE DRIVE.TBL_COMPARTIDOS DISABLE CONSTRAINT COM_USU_FKv2;

insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (1, 11, 22, 46, 2, 'https://theglobeandmail.com/augue.js', TO_DATE('7/17/2018','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (2, 30, 11, 41, 2, 'http://instagram.com/luctus/rutrum/nulla/tellus/in.html', TO_DATE('3/4/2019','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (3, 13, 12, 36, 1, 'http://yale.edu/dui/nec/nisi/volutpat.html', TO_DATE('11/14/2018','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (4, 35, 44, 19, 1, 'https://tumblr.com/sit/amet/nulla/quisque/arcu/libero.js', TO_DATE('5/28/2018','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (5, 17, 11, 41, 2, 'http://t.co/ac/neque.jsp', TO_DATE('3/28/2019','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (6, 23, 19, 26, 2, 'http://toplist.cz/vestibulum.png', TO_DATE('1/1/2019','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (7, 16, 26, 27, 1, 'https://joomla.org/dapibus/at/diam/nam.jpg', TO_DATE('8/9/2018','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (8, 13, 39, 37, 1, 'http://drupal.org/amet/justo/morbi/ut/odio/cras.jpg', TO_DATE('9/30/2018','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (9, 23, 28, 48, 2, 'http://is.gd/vestibulum/velit/id/pretium/iaculis/diam.aspx', TO_DATE('1/16/2019','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (10, 29, 20, 42, 1, 'https://unesco.org/cubilia/curae/donec/pharetra/magna/vestibulum/aliquet.jpg', TO_DATE('4/5/2019','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (11, 28, 33, 25, 2, 'http://ustream.tv/ligula/suspendisse/ornare/consequat/lectus/in.xml', TO_DATE('2/16/2019','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (12, 26, 20, 34, 2, 'http://nsw.gov.au/at/nibh/in/hac/habitasse/platea/dictumst.js', TO_DATE('11/3/2018','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (13, 32, 31, 15, 2, 'http://wikia.com/quam/sapien/varius/ut/blandit/non.js', TO_DATE('3/8/2019','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (14, 13, 30, 17, 1, 'https://cornell.edu/phasellus.xml', TO_DATE('6/16/2018','mm/dd/yyyy'));
insert into TBL_COMPARTIDOS (codigo_compartido, codigo_carpeta, codigo_archivo, codigo_usuario, codigo_tipo_compartido, enlace_compartido, fecha_compartido) values (15, 11, 24, 23, 1, 'https://comsenz.com/est/congue/elementum/in/hac/habitasse.png', TO_DATE('6/17/2018','mm/dd/yyyy'));

ALTER TABLE DRIVE.TBL_COMPARTIDOS ENABLE CONSTRAINT COM_TIP_COM_FK;
ALTER TABLE DRIVE.TBL_COMPARTIDOS ENABLE CONSTRAINT COM_CAR_FK;
ALTER TABLE DRIVE.TBL_COMPARTIDOS ENABLE CONSTRAINT COM_ARC_FKv2;
ALTER TABLE DRIVE.TBL_COMPARTIDOS ENABLE CONSTRAINT COM_USU_FKv2;