CREATE SEQUENCE SEQ_CODIGO_MEDIO INCREMENT BY 1 START WITH 1;

CREATE OR REPLACE PROCEDURE P_AGREGAR_TARJETA (
	p_codigo_entidad tbl_medios_bancarios.codigo_entidad%TYPE,
	p_codigo_moneda tbl_medios_bancarios.codigo_moneda%TYPE,
	p_codigo_usuario tbl_medios_bancarios.codigo_usuario%TYPE,
	p_numero_tarjeta tbl_medios_bancarios.numero_tarjeta%TYPE,
	p_nombre_propietario tbl_medios_bancarios.nombre_propietario%TYPE,
	p_fecha_caducidad VARCHAR2,
	p_codigo_tarjeta tbl_medios_bancarios.codigo_tarjeta%TYPE,	
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_MEDIOS_BANCARIOS
	WHERE CODIGO_USUARIO = p_codigo_usuario;

	IF (v_cantidad = 0) THEN
		INSERT INTO TBL_MEDIOS_BANCARIOS (
			CODIGO_MEDIO,
			CODIGO_ENTIDAD,
			CODIGO_MONEDA,
			CODIGO_USUARIO,
			NUMERO_TARJETA,
			NOMBRE_PROPIETARIO,
			FECHA_CADUCIDAD,			
			CODIGO_TARJETA			
		) VALUES (
			SEQ_CODIGO_MEDIO.NEXTVAL,
			p_codigo_entidad,
			p_codigo_moneda,
			p_codigo_usuario,
			p_numero_tarjeta,
			p_nombre_propietario,
			TO_DATE(p_fecha_caducidad,'mm/yyyy'),
			p_codigo_tarjeta			
		);
		COMMIT;
		p_codigo_resultado := 1;
		p_mensaje := 'Registro almacenado con exito';
	ELSE
		p_codigo_resultado := 0;
		p_mensaje := 'Archivo duplicado, no se pudo guardar';
	END IF;
EXCEPTION
	WHEN OTHERS THEN
		ROLLBACK;
		DBMS_OUTPUT.PUT_LINE ('ERROR: ' || SQLCODE || ' - ' || SQLERRM);
		p_codigo_resultado := 0;
		p_mensaje := 'ERROR: ' || SQLCODE || ' - ' || SQLERRM;
END;

CREATE OR REPLACE PROCEDURE P_MODIFICAR_TARJETA (
	p_codigo_medio tbl_medios_bancarios.codigo_medio%TYPE,
	p_numero_tarjeta tbl_medios_bancarios.numero_tarjeta%TYPE,	
	p_nombre_propietario tbl_medios_bancarios.nombre_propietario%TYPE,
	p_fecha_caducidad VARCHAR2,
	p_codigo_tarjeta tbl_medios_bancarios.codigo_tarjeta%TYPE,	
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;

BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_MEDIOS_BANCARIOS
	WHERE CODIGO_MEDIO = p_codigo_medio;

	IF (v_cantidad > 0) THEN		

		IF (p_numero_tarjeta IS NOT NULL) THEN
			UPDATE TBL_MEDIOS_BANCARIOS
			SET NUMERO_TARJETA = p_numero_tarjeta
			WHERE CODIGO_MEDIO = p_codigo_medio;
		END IF;

		IF (p_nombre_propietario IS NOT NULL) THEN
			UPDATE TBL_MEDIOS_BANCARIOS
			SET NOMBRE_PROPIETARIO = p_nombre_propietario
			WHERE CODIGO_MEDIO = p_codigo_medio;
		END IF;

		IF (p_fecha_caducidad IS NOT NULL) THEN
			UPDATE TBL_MEDIOS_BANCARIOS
			SET FECHA_CADUCIDAD = TO_DATE(p_fecha_caducidad,'mm/yyyy')
			WHERE CODIGO_MEDIO = p_codigo_medio;
		END IF;

		IF (p_codigo_tarjeta IS NOT NULL) THEN
			UPDATE TBL_MEDIOS_BANCARIOS
			SET CODIGO_TARJETA = p_codigo_tarjeta
			WHERE CODIGO_MEDIO = p_codigo_medio;
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


CREATE OR REPLACE PROCEDURE P_ELIMINAR_TARJETA (
	p_codigo_medio tbl_medios_bancarios.codigo_medio%TYPE,
	p_codigo_resultado OUT VARCHAR2,
	p_mensaje OUT VARCHAR2
) AS
	v_cantidad INTEGER;
BEGIN
	SELECT COUNT(*) INTO v_cantidad
	FROM TBL_MEDIOS_BANCARIOS
	WHERE CODIGO_MEDIO = p_codigo_medio;

	IF (v_cantidad > 0) THEN

		DELETE FROM TBL_MEDIOS_BANCARIOS WHERE CODIGO_MEDIO = p_codigo_medio;		
		COMMIT;

		p_codigo_resultado := 1;
		p_mensaje := 'Registro eliminado con exito';
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