SELECT *
FROM tbl_servicios_electronicos;

Ejemplo para insertar un empleado
create or replace PROCEDURE P_AGREGAR_USUARIO(
    p_codigo_genero tbl_usuarios.codigo_genero%TYPE,
    p_codigo_lugar tbl_usuarios.codigo_lugar%TYPE,
    p_codigo_tipo tbl_usuarios.codigo_tipo%TYPE,
    p_codigo_servicio tbl_usuarios.codigo_servicio%TYPE,
    p_nombre tbl_usuarios.nombre%TYPE,
    p_usuario tbl_usuarios.usuario%TYPE,
    p_correo tbl_usuarios.correo%TYPE,
    p_contrasenia tbl_usuarios.contrasenia%TYPE,
    p_espacio_usado tbl_usuarios.espacio_usado%TYPE,
    p_telefono tbl_usuarios.telefono%TYPE,
    p_correo_alterno tbl_usuarios.correo_alterno%TYPE,
    p_fecha_nacimiento tbl_usuarios.fecha_nacimiento%TYPE
) AS
    v_cantidad number;
BEGIN
    select count(*)
    into v_cantidad
    from tbl_usuarios
    where correo = p_correo;

    IF (v_cantidad = 0) THEN
        INSERT INTO tbl_usuarios (
            codigo_genero,
            codigo_lugar,
            codigo_tipo,
            codigo_servicio,
            nombre,
            usuario,
            correo,
            contrasenia,
            espacio_usado,
            telefono,
            correo_alterno,
            fecha_nacimiento
        ) VALUES (
            tbl_usuarios_seq.nextval,
            p_codigo_genero,
            p_codigo_lugar,
            p_codigo_tipo,
            p_codigo_servicio,
            p_nombre,
            p_usuario,
            p_correo,
            p_contrasenia,
            p_espacio_usado,
            p_telefono,
            p_correo_alterno,
            p_fecha_nacimiento
        );
        commit;
        p_mensaje := 'Registro almanceado con éxito';
        p_codigo_resultado:=1;
    ELSE
        p_mensaje := 'El correo esta duplicado, no se pudo guardar';
        p_codigo_resultado:=0;
    END IF;
    --LOREM IPSUM
EXCEPTION
    WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: ' || SQLCODE || '-'||SQLERRM);
        ROLLBACK;
        p_mensaje:= 'Error al guardar el usuario: ' || SQLCODE || '-'||SQLERRM;
        p_codigo_resultado:=0;
END;

EXECUTE P_AGREGAR_USUARIO(p_nombre => 'Juan',p_last_name => 'Perez',p_email => 'jperez@gmail.com',p_phone_number => '',p_hire_date => sysdate,p_job_id => 'SA_MAN',p_salary => 2000,p_commission_pct => 0.5,p_manager_id => 100,p_department_id => 20);
