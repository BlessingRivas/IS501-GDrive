CREATE SEQUENCE SEQ_CODIGO_SERVICIO INCREMENT BY 1 START WITH 1;

CREATE OR REPLACE PROCEDURE P_AGREGAR_SERVICIO (	
	p_codigo_usuario tbl_servicios_electronicos.codigo_usuario%TYPE,	
	p_nombre_servicio tbl_servicios_electronicos.nombre_servicio%TYPE,
	p_telefono tbl_servicios_electronicos.telefono%TYPE,
	p_nombre_usuario tbl_servicios_electronicos.nombre_usuario%TYPE,
	p_contrasenia tbl_servicios_electronicos.contrasenia%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_SERVICIOS_ELECTRONICOS
	WHERE CODIGO_USUARIO = p_codigo_usuario;

	IF (v_cantidad = 0) THEN
		INSERT INTO TBL_SERVICIOS_ELECTRONICOS (
			CODIGO_SERVICIO,			
			CODIGO_USUARIO,			
			NOMBRE_SERVICIO,						
			TELEFONO,
			NOMBRE_USUARIO,
			CONTRASENIA
		) VALUES (
			SEQ_CODIGO_SERVICIO.NEXTVAL,			
			p_codigo_usuario,			
			p_nombre_servicio,			
			p_telefono,
			p_nombre_usuario,
			p_contrasenia
		);
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Registro almacenado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'Servicio duplicado, no se pudo guardar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;

CREATE OR REPLACE PROCEDURE P_MODIFICAR_SERVICIO (
	p_codigo_servicio tbl_servicios_electronicos.codigo_servicio%TYPE,	
	p_nombre_servicio tbl_servicios_electronicos.nombre_servicio%TYPE,	
	p_telefono tbl_servicios_electronicos.telefono%TYPE,
	p_nombre_usuario tbl_servicios_electronicos.nombre_usuario%TYPE,
	p_contrasenia tbl_servicios_electronicos.contrasenia%TYPE,	
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;

BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_SERVICIOS_ELECTRONICOS
	WHERE CODIGO_SERVICIO = p_codigo_servicio;

	IF (v_cantidad > 0) THEN

		IF (p_nombre_servicio IS NOT NULL) THEN
			UPDATE TBL_SERVICIOS_ELECTRONICOS
			SET NOMBRE_SERVICIO = p_nombre_servicio
			WHERE CODIGO_SERVICIO = p_codigo_servicio;
		END IF;		

		IF (p_telefono IS NOT NULL) THEN
			UPDATE TBL_SERVICIOS_ELECTRONICOS
			SET TELEFONO = p_telefono
			WHERE CODIGO_SERVICIO = p_codigo_servicio;
		END IF;

		IF (p_nombre_usuario IS NOT NULL) THEN
			UPDATE TBL_SERVICIOS_ELECTRONICOS
			SET NOMBRE_USUARIO = p_nombre_usuario
			WHERE CODIGO_SERVICIO = p_codigo_servicio;
		END IF;

		IF (p_contrasenia IS NOT NULL) THEN
			UPDATE TBL_SERVICIOS_ELECTRONICOS
			SET CONTRASENIA = p_contrasenia
			WHERE CODIGO_SERVICIO = p_codigo_servicio;
		END IF;
		
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Registro modificado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'No se encontro el archivo, no se pudo guardar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;


CREATE OR REPLACE PROCEDURE P_ELIMINAR_SERVICIO (
	p_codigo_servicio tbl_servicios_electronicos.codigo_servicio%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_SERVICIOS_ELECTRONICOS
	WHERE CODIGO_SERVICIO = p_codigo_servicio;

	IF (v_cantidad > 0) THEN

		DELETE FROM TBL_SERVICIOS_ELECTRONICOS WHERE CODIGO_SERVICIO = p_codigo_servicio;		
		COMMIT;

		p_codigo_resultado := 1;
		p_mensaje := 'Servicio eliminado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'No se encontro el registro, no se pudo eliminar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;