CREATE SEQUENCE SEQ_CODIGO_COMPARTIDO
INCREMENT BY 1
START WITH 1;

create or replace PROCEDURE P_AGREGAR_COMPARTIDO(
    p_codigo_carpeta tbl_compartidos.codigo_carpeta%TYPE,
    p_codigo_archivo tbl_compartidos.codigo_archivo%TYPE,
    p_codigo_usuario tbl_compartidos.codigo_usuario%TYPE,
    p_codigo_tipo_compartido tbl_compartidos.codigo_tipo_compartido%TYPE,
    p_enlace_compartido tbl_compartidos.enlace_compartido%TYPE,    
    p_codigo_resultado out VARCHAR2,
    p_mensaje out VARCHAR2
) AS
    v_cantidad number;
BEGIN
    select count(*)
    into v_cantidad
    from tbl_compartidos
    where codigo_usuario = p_codigo_usuario and (codigo_archivo = p_codigo_archivo or codigo_carpeta = p_codigo_carpeta);

    IF (v_cantidad = 0) THEN
        INSERT INTO tbl_compartidos (
            codigo_compartido,
            codigo_carpeta,
            codigo_archivo,
            codigo_usuario,
            codigo_tipo_compartido,
            enlace_compartido,
            fecha_compartido
        ) VALUES (
            seq_codigo_compartido.nextval,            
            p_codigo_carpeta,
            p_codigo_archivo,
            p_codigo_usuario,
            p_codigo_tipo_compartido,
            p_enlace_compartido,
            sysdate
        );
        commit;
        p_mensaje := 'Registro almanceado con éxito';
        p_codigo_resultado:=1;
    ELSE
        p_mensaje := 'Ya se compartio a este usuario, no se pudo guardar';
        p_codigo_resultado:=0;
    END IF;
EXCEPTION
    WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: ' || SQLCODE || '-'||SQLERRM);
        ROLLBACK;
        p_mensaje:= 'Error al compartir: ' || SQLCODE || '-'||SQLERRM;
        p_codigo_resultado:=0;
END;

create or replace PROCEDURE P_ELIMINAR_COMPARTIDO(
    p_codigo_compartido tbl_compartidos.codigo_compartido%TYPE,    
    p_codigo_resultado out VARCHAR2,
    p_mensaje out VARCHAR2
) AS
BEGIN
        DELETE FROM  tbl_compartidos where 
            codigo_compartido = p_codigo_compartido;
        commit;
        p_mensaje := 'Registro eliminado con éxito';
        p_codigo_resultado:=1;        
EXCEPTION
    WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: ' || SQLCODE || '-'||SQLERRM);
        ROLLBACK;
        p_mensaje:= 'Error al eliminar: ' || SQLCODE || '-'||SQLERRM;
        p_codigo_resultado:=0;
END;