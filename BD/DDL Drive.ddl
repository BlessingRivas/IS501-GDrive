-- Generado por Oracle SQL Developer Data Modeler 18.4.0.339.1536
--   en:        2019-05-03 14:53:18 CST
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



CREATE TABLE tbl_acciones (
    codigo_accion            INTEGER NOT NULL,
    codigo_tipo_accion       INTEGER NOT NULL,
    codigo_carpeta_origen    INTEGER,
    codigo_carpeta_destino   INTEGER,
    codigo_archivo_origen    INTEGER,
    codigo_archivo_destino   INTEGER,
    fecha                    DATE NOT NULL
);

ALTER TABLE tbl_acciones ADD CONSTRAINT tbl_acciones_pk PRIMARY KEY ( codigo_accion );

CREATE TABLE tbl_aplicaciones_terceros (
    codigo_aplicacion   INTEGER NOT NULL,
    nombre_aplicacion   VARCHAR2(100 CHAR) NOT NULL,
    enlace_aplicacion   VARCHAR2(150 CHAR) NOT NULL,
    icono_aplicacion    VARCHAR2(250 CHAR)
);

ALTER TABLE tbl_aplicaciones_terceros ADD CONSTRAINT tbl_aplicaciones_terceros_pk PRIMARY KEY ( codigo_aplicacion );

CREATE TABLE tbl_aplicaciones_x_tipos (
    codigo_tipo_archivo   INTEGER NOT NULL,
    codigo_aplicacion     INTEGER NOT NULL
);

CREATE TABLE tbl_archivos (
    codigo_archivo        INTEGER NOT NULL,
    codigo_usuario        INTEGER NOT NULL,
    codigo_carpeta        INTEGER,
    codigo_unidad         INTEGER NOT NULL,
    codigo_tipo_archivo   INTEGER NOT NULL,
    nombre                VARCHAR2(100 CHAR) NOT NULL,
    tamanio               NUMBER NOT NULL,
    fecha_subida          DATE NOT NULL,
    fecha_modificacion    DATE NOT NULL,
    fecha_ultimo_acceso   DATE NOT NULL,
    archivo               VARCHAR2(4000) NOT NULL,
    descripcion           VARCHAR2(250 CHAR),
    eliminado             CHAR(1),
    fecha_eliminado       DATE
);

ALTER TABLE tbl_archivos ADD CONSTRAINT tbl_archivos_pk PRIMARY KEY ( codigo_archivo );

CREATE TABLE tbl_beneficios (
    codigo_beneficio   INTEGER NOT NULL,
    nombre_beneficio   VARCHAR2(100 CHAR)
);

ALTER TABLE tbl_beneficios ADD CONSTRAINT tbl_beneficios_pk PRIMARY KEY ( codigo_beneficio );

CREATE TABLE tbl_beneficios_x_cuenta (
    codigo_tipo_cuenta   INTEGER NOT NULL,
    codigo_beneficio     INTEGER NOT NULL
);

CREATE TABLE tbl_carpetas (
    codigo_carpeta         INTEGER NOT NULL,
    codigo_usuario         INTEGER NOT NULL,
    codigo_carpeta_padre   INTEGER,
    nombre                 VARCHAR2(200 CHAR) NOT NULL,
    fecha_creacion         DATE NOT NULL,
    fecha_modificacion     DATE NOT NULL,
    fecha_ultimo_acceso    DATE NOT NULL,
    eliminado              CHAR(1),
    fecha_eliminado        DATE
);

ALTER TABLE tbl_carpetas ADD CONSTRAINT tbl_carpetas_pk PRIMARY KEY ( codigo_carpeta );

CREATE TABLE tbl_comentarios (
    codigo_comentario         INTEGER NOT NULL,
    codigo_archivo            INTEGER NOT NULL,
    codigo_usuario            INTEGER NOT NULL,
    codigo_comentario_padre   INTEGER,
    comentario                VARCHAR2(450 CHAR) NOT NULL,
    fecha_hora_comentario     DATE,
    vinculo_comentario        VARCHAR2(300 CHAR)
);

ALTER TABLE tbl_comentarios ADD CONSTRAINT tbl_comentarios_pk PRIMARY KEY ( codigo_comentario );

CREATE TABLE tbl_compartidos (
    codigo_compartido        INTEGER NOT NULL,
    codigo_carpeta           INTEGER,
    codigo_archivo           INTEGER,
    codigo_usuario           INTEGER NOT NULL,
    codigo_tipo_compartido   INTEGER NOT NULL,
    enlace_compartido        VARCHAR2(300 CHAR) NOT NULL,
    fecha_compartido         DATE NOT NULL
);

ALTER TABLE tbl_compartidos ADD CONSTRAINT tbl_compartidos_pkv1 PRIMARY KEY ( codigo_compartido );

CREATE TABLE tbl_contenidos_sincronizacion (
    codigo_sincronizacion   INTEGER NOT NULL,
    codigo_ordenador        INTEGER NOT NULL,
    codigo_carpeta          INTEGER,
    codigo_archivo          INTEGER,
    fecha_sincronizacion    DATE
);

ALTER TABLE tbl_contenidos_sincronizacion ADD CONSTRAINT tbl_contenidos_sincro_pk PRIMARY KEY ( codigo_sincronizacion );

CREATE TABLE tbl_copias_de_seguridad (
    codigo_copia_seguridad   INTEGER NOT NULL,
    codigo_usuario           INTEGER NOT NULL,
    fecha_hora_copia         DATE NOT NULL,
    archivo_copia            VARCHAR2(4000) NOT NULL
);

ALTER TABLE tbl_copias_de_seguridad ADD CONSTRAINT tbl_copias_de_seguridad_pk PRIMARY KEY ( codigo_copia_seguridad );

CREATE TABLE tbl_destacados (
    codigo_carpeta    INTEGER,
    codigo_archivo    INTEGER,
    fecha_destacado   DATE NOT NULL
);

CREATE TABLE tbl_entidades_financieras (
    codigo_entidad   INTEGER NOT NULL,
    nombre_entidad   VARCHAR2(100 CHAR) NOT NULL,
    telefono         VARCHAR2(50 CHAR) NOT NULL
);

ALTER TABLE tbl_entidades_financieras ADD CONSTRAINT tbl_entidades_financieras_pk PRIMARY KEY ( codigo_entidad );

CREATE TABLE tbl_facturas (
    codigo_factura       INTEGER NOT NULL,
    codigo_usuario       INTEGER NOT NULL,
    codigo_medio_pago    INTEGER NOT NULL,
    codigo_tipo_cuenta   INTEGER NOT NULL,
    fecha_facturacion    DATE NOT NULL,
    costo                NUMBER NOT NULL,
    impuesto             NUMBER,
    descuento            NUMBER
);

ALTER TABLE tbl_facturas ADD CONSTRAINT tbl_facturas_pk PRIMARY KEY ( codigo_factura );

CREATE TABLE tbl_generos (
    codigo_genero   INTEGER NOT NULL,
    genero          VARCHAR2(50 CHAR) NOT NULL,
    abreviatura     VARCHAR2(10 CHAR)
);

ALTER TABLE tbl_generos ADD CONSTRAINT tbl_generos_pk PRIMARY KEY ( codigo_genero );

CREATE TABLE tbl_imagenes (
    codigo_archivo   INTEGER NOT NULL,
    ancho            NUMBER,
    alto             NUMBER
);

ALTER TABLE tbl_imagenes ADD CONSTRAINT tbl_imagenes_pk PRIMARY KEY ( codigo_archivo );

CREATE TABLE tbl_lugares (
    codigo_lugar         INTEGER NOT NULL,
    codigo_lugar_padre   INTEGER,
    nombre_lugar         VARCHAR2(200 CHAR) NOT NULL,
    longitud             NUMBER,
    latitud              NUMBER
);

ALTER TABLE tbl_lugares ADD CONSTRAINT tbl_lugares_pk PRIMARY KEY ( codigo_lugar );

CREATE TABLE tbl_marcas (
    codigo_marca   INTEGER NOT NULL,
    nombre_marca   VARCHAR2(100 CHAR) NOT NULL
);

ALTER TABLE tbl_marcas ADD CONSTRAINT tbl_marcas_pk PRIMARY KEY ( codigo_marca );

CREATE TABLE tbl_medios_bancarios (
    codigo_medio         INTEGER NOT NULL,
    codigo_entidad       INTEGER NOT NULL,
    codigo_moneda        INTEGER NOT NULL,
    codigo_usuario       INTEGER NOT NULL,
    numero_tarjeta       VARCHAR2(100 CHAR) NOT NULL,
    nombre_propietario   VARCHAR2(200 CHAR) NOT NULL,
    fecha_caducidad      DATE NOT NULL,
    codigo_tarjeta       VARCHAR2(10 CHAR) NOT NULL
);

ALTER TABLE tbl_medios_bancarios ADD CONSTRAINT tbl_medios_bancarios_pk PRIMARY KEY ( codigo_medio );

CREATE TABLE tbl_monedas (
    codigo_moneda   INTEGER NOT NULL,
    nombre_moneda   VARCHAR2(100 CHAR) NOT NULL,
    abreviatura     VARCHAR2(10 CHAR)
);

ALTER TABLE tbl_monedas ADD CONSTRAINT tbl_monedas_pk PRIMARY KEY ( codigo_moneda );

CREATE TABLE tbl_ordenadores (
    codigo_ordenador    INTEGER NOT NULL,
    codigo_usuario      INTEGER NOT NULL,
    codigo_marca        INTEGER NOT NULL,
    codigo_sistema      INTEGER NOT NULL,
    codigo_procesador   INTEGER NOT NULL,
    direccion_mac       VARCHAR2(50 CHAR) NOT NULL,
    fecha_registro      DATE NOT NULL,
    capacidad_memoria   NUMBER,
    capacidad_disco     NUMBER
);

ALTER TABLE tbl_ordenadores ADD CONSTRAINT tbl_ordenadores_pk PRIMARY KEY ( codigo_ordenador );

CREATE TABLE tbl_procesadores (
    codigo_procesador   INTEGER NOT NULL,
    codigo_marca        INTEGER NOT NULL,
    modelo              VARCHAR2(100 CHAR) NOT NULL,
    frecuencia          NUMBER NOT NULL
);

ALTER TABLE tbl_procesadores ADD CONSTRAINT tbl_procesadores_pk PRIMARY KEY ( codigo_procesador );

CREATE TABLE tbl_servicios_electronicos (
    codigo_servicio   INTEGER NOT NULL,
    codigo_usuario    INTEGER NOT NULL,
    nombre_servicio   VARCHAR2(100 CHAR) NOT NULL,
    telefono          VARCHAR2(50 CHAR) NOT NULL,
    nombre_usuario    VARCHAR2(500 CHAR) NOT NULL,
    contrasenia       VARCHAR2(500 CHAR) NOT NULL
);

ALTER TABLE tbl_servicios_electronicos ADD CONSTRAINT tbl_servicios_electronicos_pk PRIMARY KEY ( codigo_servicio );

CREATE TABLE tbl_sistemas_operativos (
    codigo_sistema   INTEGER NOT NULL,
    codigo_version   INTEGER NOT NULL,
    nombre_sistema   VARCHAR2(100 CHAR) NOT NULL
);

ALTER TABLE tbl_sistemas_operativos ADD CONSTRAINT tbl_sistemas_operativos_pk PRIMARY KEY ( codigo_sistema );

CREATE TABLE tbl_tipos_acciones (
    codigo_tipo_accion   INTEGER NOT NULL,
    nombre_accion        VARCHAR2(50 CHAR) NOT NULL
);

ALTER TABLE tbl_tipos_acciones ADD CONSTRAINT tbl_tipos_acciones_pk PRIMARY KEY ( codigo_tipo_accion );

CREATE TABLE tbl_tipos_archivos (
    codigo_tipo_archivo   INTEGER NOT NULL,
    tipo_archivo          VARCHAR2(100 CHAR) NOT NULL,
    icono                 VARCHAR2(250 CHAR) NOT NULL
);

ALTER TABLE tbl_tipos_archivos ADD CONSTRAINT tbl_tipos_archivos_pk PRIMARY KEY ( codigo_tipo_archivo );

CREATE TABLE tbl_tipos_compartidos (
    codigo_tipo_compartido   INTEGER NOT NULL,
    tipo_compartido          VARCHAR2(100 CHAR) NOT NULL
);

ALTER TABLE tbl_tipos_compartidos ADD CONSTRAINT tbl_compartidos_pk PRIMARY KEY ( codigo_tipo_compartido );

CREATE TABLE tbl_tipos_cuentas (
    codigo_tipo              INTEGER NOT NULL,
    codigo_unidad            INTEGER NOT NULL,
    nombre                   VARCHAR2(250 CHAR) NOT NULL,
    espacio_almacenamiento   NUMBER NOT NULL,
    precio                   NUMBER NOT NULL
);

ALTER TABLE tbl_tipos_cuentas ADD CONSTRAINT tbl_tipos_cuentas_pk PRIMARY KEY ( codigo_tipo );

CREATE TABLE tbl_unidades (
    codigo_unidad   INTEGER NOT NULL,
    nombre_unidad   VARCHAR2(50 CHAR) NOT NULL,
    abreviatura     VARCHAR2(10 CHAR)
);

ALTER TABLE tbl_unidades ADD CONSTRAINT tbl_unidades_pk PRIMARY KEY ( codigo_unidad );

CREATE TABLE tbl_usuarios (
    codigo_usuario     INTEGER NOT NULL,
    codigo_genero      INTEGER NOT NULL,
    codigo_lugar       INTEGER NOT NULL,
    codigo_tipo        INTEGER NOT NULL,
    nombre             VARCHAR2(200 CHAR) NOT NULL,
    usuario            VARCHAR2(60 CHAR) NOT NULL,
    correo             VARCHAR2(100 CHAR) NOT NULL,
    contrasenia        VARCHAR2(50 CHAR) NOT NULL,
    foto_perfil        VARCHAR2(1000 CHAR),
    espacio_usado      NUMBER NOT NULL,
    telefono           VARCHAR2(50 CHAR),
    correo_alterno     VARCHAR2(100 CHAR),
    fecha_nacimiento   DATE
);

ALTER TABLE tbl_usuarios ADD CONSTRAINT tbl_usuarios_pk PRIMARY KEY ( codigo_usuario );

CREATE TABLE tbl_versiones (
    codigo_version   INTEGER NOT NULL,
    nombre_version   VARCHAR2(100 CHAR) NOT NULL
);

ALTER TABLE tbl_versiones ADD CONSTRAINT tbl_versiones_pk PRIMARY KEY ( codigo_version );

CREATE TABLE tbl_videos (
    codigo_archivo   INTEGER NOT NULL,
    ancho            NUMBER NOT NULL,
    alto             NUMBER NOT NULL,
    duracion         NUMBER NOT NULL
);

ALTER TABLE tbl_videos ADD CONSTRAINT tbl_videos_pk PRIMARY KEY ( codigo_archivo );

ALTER TABLE tbl_acciones
    ADD CONSTRAINT acc_arc_des_fk FOREIGN KEY ( codigo_archivo_destino )
        REFERENCES tbl_archivos ( codigo_archivo );

ALTER TABLE tbl_acciones
    ADD CONSTRAINT acc_arc_ori_fk FOREIGN KEY ( codigo_archivo_origen )
        REFERENCES tbl_archivos ( codigo_archivo );

ALTER TABLE tbl_acciones
    ADD CONSTRAINT acc_car_des_fk FOREIGN KEY ( codigo_carpeta_destino )
        REFERENCES tbl_carpetas ( codigo_carpeta );

ALTER TABLE tbl_acciones
    ADD CONSTRAINT acc_car_ori_fk FOREIGN KEY ( codigo_carpeta_origen )
        REFERENCES tbl_carpetas ( codigo_carpeta );

ALTER TABLE tbl_acciones
    ADD CONSTRAINT acc_tip_acc_fk FOREIGN KEY ( codigo_tipo_accion )
        REFERENCES tbl_tipos_acciones ( codigo_tipo_accion );

ALTER TABLE tbl_aplicaciones_x_tipos
    ADD CONSTRAINT apl_x_tip_apl_ter_fk FOREIGN KEY ( codigo_aplicacion )
        REFERENCES tbl_aplicaciones_terceros ( codigo_aplicacion );

ALTER TABLE tbl_aplicaciones_x_tipos
    ADD CONSTRAINT apl_x_tip_tip_arc_fk FOREIGN KEY ( codigo_tipo_archivo )
        REFERENCES tbl_tipos_archivos ( codigo_tipo_archivo );

ALTER TABLE tbl_archivos
    ADD CONSTRAINT arc_car_fk FOREIGN KEY ( codigo_carpeta )
        REFERENCES tbl_carpetas ( codigo_carpeta );

ALTER TABLE tbl_archivos
    ADD CONSTRAINT arc_tip_arc_fk FOREIGN KEY ( codigo_tipo_archivo )
        REFERENCES tbl_tipos_archivos ( codigo_tipo_archivo );

ALTER TABLE tbl_archivos
    ADD CONSTRAINT arc_uni_fk FOREIGN KEY ( codigo_unidad )
        REFERENCES tbl_unidades ( codigo_unidad );

ALTER TABLE tbl_archivos
    ADD CONSTRAINT arc_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_beneficios_x_cuenta
    ADD CONSTRAINT ben_x_cue_ben_fk FOREIGN KEY ( codigo_beneficio )
        REFERENCES tbl_beneficios ( codigo_beneficio );

ALTER TABLE tbl_beneficios_x_cuenta
    ADD CONSTRAINT ben_x_cue_tip_cue_fk FOREIGN KEY ( codigo_tipo_cuenta )
        REFERENCES tbl_tipos_cuentas ( codigo_tipo );

ALTER TABLE tbl_carpetas
    ADD CONSTRAINT car_car_fk FOREIGN KEY ( codigo_carpeta_padre )
        REFERENCES tbl_carpetas ( codigo_carpeta );

ALTER TABLE tbl_carpetas
    ADD CONSTRAINT car_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_comentarios
    ADD CONSTRAINT com_arc_fk FOREIGN KEY ( codigo_archivo )
        REFERENCES tbl_archivos ( codigo_archivo );

ALTER TABLE tbl_compartidos
    ADD CONSTRAINT com_arc_fkv2 FOREIGN KEY ( codigo_archivo )
        REFERENCES tbl_archivos ( codigo_archivo );

ALTER TABLE tbl_compartidos
    ADD CONSTRAINT com_car_fk FOREIGN KEY ( codigo_carpeta )
        REFERENCES tbl_carpetas ( codigo_carpeta );

ALTER TABLE tbl_comentarios
    ADD CONSTRAINT com_com_fk FOREIGN KEY ( codigo_comentario_padre )
        REFERENCES tbl_comentarios ( codigo_comentario );

ALTER TABLE tbl_compartidos
    ADD CONSTRAINT com_tip_com_fk FOREIGN KEY ( codigo_tipo_compartido )
        REFERENCES tbl_tipos_compartidos ( codigo_tipo_compartido );

ALTER TABLE tbl_comentarios
    ADD CONSTRAINT com_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_compartidos
    ADD CONSTRAINT com_usu_fkv2 FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_contenidos_sincronizacion
    ADD CONSTRAINT con_sin_arc_fk FOREIGN KEY ( codigo_archivo )
        REFERENCES tbl_archivos ( codigo_archivo );

ALTER TABLE tbl_contenidos_sincronizacion
    ADD CONSTRAINT con_sin_car_fk FOREIGN KEY ( codigo_carpeta )
        REFERENCES tbl_carpetas ( codigo_carpeta );

ALTER TABLE tbl_contenidos_sincronizacion
    ADD CONSTRAINT con_sin_ord_fk FOREIGN KEY ( codigo_ordenador )
        REFERENCES tbl_ordenadores ( codigo_ordenador );

ALTER TABLE tbl_copias_de_seguridad
    ADD CONSTRAINT cop_de_seg_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_destacados
    ADD CONSTRAINT des_arc_fk FOREIGN KEY ( codigo_archivo )
        REFERENCES tbl_archivos ( codigo_archivo );

ALTER TABLE tbl_destacados
    ADD CONSTRAINT des_car_fk FOREIGN KEY ( codigo_carpeta )
        REFERENCES tbl_carpetas ( codigo_carpeta );

ALTER TABLE tbl_facturas
    ADD CONSTRAINT fac_med_ban_fk FOREIGN KEY ( codigo_medio_pago )
        REFERENCES tbl_medios_bancarios ( codigo_medio );

ALTER TABLE tbl_facturas
    ADD CONSTRAINT fac_tip_cue_fk FOREIGN KEY ( codigo_tipo_cuenta )
        REFERENCES tbl_tipos_cuentas ( codigo_tipo );

ALTER TABLE tbl_facturas
    ADD CONSTRAINT fac_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_imagenes
    ADD CONSTRAINT ima_arc_fk FOREIGN KEY ( codigo_archivo )
        REFERENCES tbl_archivos ( codigo_archivo );

ALTER TABLE tbl_lugares
    ADD CONSTRAINT lug_lug_fk FOREIGN KEY ( codigo_lugar_padre )
        REFERENCES tbl_lugares ( codigo_lugar );

ALTER TABLE tbl_medios_bancarios
    ADD CONSTRAINT med_ban_ent_fin_fk FOREIGN KEY ( codigo_entidad )
        REFERENCES tbl_entidades_financieras ( codigo_entidad );

ALTER TABLE tbl_medios_bancarios
    ADD CONSTRAINT med_ban_mon_fk FOREIGN KEY ( codigo_moneda )
        REFERENCES tbl_monedas ( codigo_moneda );

ALTER TABLE tbl_medios_bancarios
    ADD CONSTRAINT med_ban_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_ordenadores
    ADD CONSTRAINT ord_mar_fk FOREIGN KEY ( codigo_marca )
        REFERENCES tbl_marcas ( codigo_marca );

ALTER TABLE tbl_ordenadores
    ADD CONSTRAINT ord_pro_fk FOREIGN KEY ( codigo_procesador )
        REFERENCES tbl_procesadores ( codigo_procesador );

ALTER TABLE tbl_ordenadores
    ADD CONSTRAINT ord_sis_ope_fk FOREIGN KEY ( codigo_sistema )
        REFERENCES tbl_sistemas_operativos ( codigo_sistema );

ALTER TABLE tbl_ordenadores
    ADD CONSTRAINT ord_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_procesadores
    ADD CONSTRAINT pro_mar_fk FOREIGN KEY ( codigo_marca )
        REFERENCES tbl_marcas ( codigo_marca );

ALTER TABLE tbl_servicios_electronicos
    ADD CONSTRAINT ser_ele_usu_fk FOREIGN KEY ( codigo_usuario )
        REFERENCES tbl_usuarios ( codigo_usuario );

ALTER TABLE tbl_sistemas_operativos
    ADD CONSTRAINT sis_ope_ver_fk FOREIGN KEY ( codigo_version )
        REFERENCES tbl_versiones ( codigo_version );

ALTER TABLE tbl_tipos_cuentas
    ADD CONSTRAINT tip_cue_uni_fk FOREIGN KEY ( codigo_unidad )
        REFERENCES tbl_unidades ( codigo_unidad );

ALTER TABLE tbl_usuarios
    ADD CONSTRAINT usu_gen_fk FOREIGN KEY ( codigo_genero )
        REFERENCES tbl_generos ( codigo_genero );

ALTER TABLE tbl_usuarios
    ADD CONSTRAINT usu_lug_fk FOREIGN KEY ( codigo_lugar )
        REFERENCES tbl_lugares ( codigo_lugar );

ALTER TABLE tbl_usuarios
    ADD CONSTRAINT usu_tip_cue_fk FOREIGN KEY ( codigo_tipo )
        REFERENCES tbl_tipos_cuentas ( codigo_tipo );

ALTER TABLE tbl_videos
    ADD CONSTRAINT vid_arc_fk FOREIGN KEY ( codigo_archivo )
        REFERENCES tbl_archivos ( codigo_archivo );



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                            32
-- CREATE INDEX                             0
-- ALTER TABLE                             77
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
