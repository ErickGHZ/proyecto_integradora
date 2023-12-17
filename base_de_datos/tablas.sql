    CREATE TABLE IF NOT EXISTS usuario(
        id_usuario INT PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        contraseña CHAR(12) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS carreras (
        id_carrera INT PRIMARY KEY AUTO_INCREMENT,
        nombre_carrera VARCHAR(50) NOT NULL,
        tipo VARCHAR(20) NOT NULL,
        modelo VARCHAR(20) NOT NULL,
        duracion INT
    );

    CREATE TABLE IF NOT EXISTS grupos (
        id_grupo INT PRIMARY KEY AUTO_INCREMENT,
        nombre_grupo VARCHAR(50) NOT NULL,
        id_carrera INT,
        numero_estudiantes INT NOT NULL,
        grado_academico INT NOT NULL,
        FOREIGN KEY (id_carrera) REFERENCES carreras(id_carrera)
    );

    CREATE TABLE IF NOT EXISTS materias(
        id_materia INT PRIMARY KEY AUTO_INCREMENT,
        id_grupo INT,
        nombre_materia VARCHAR(50) NOT NULL,
        horas_totales DECIMAL(10, 2) NOT NULL,
        hora_semanal DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
    );

    CREATE TABLE IF NOT EXISTS hora_aulas(
        id_hora_aula INT PRIMARY KEY AUTO_INCREMENT,
        dia_semana INT NOT NULL,
        hora_inicio TIME NOT NULL,
        hora_fin TIME NOT NULL
    );

    CREATE TABLE IF NOT EXISTS aulas(
        id_aula INT PRIMARY KEY AUTO_INCREMENT,
        nombre_aula VARCHAR(20) NOT NULL,
        capacidad INT NOT NULL,
        tipo_aula VARCHAR(15) NOT NULL,
        edificio VARCHAR(15) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS disponibilidad_aulas(
        id_disponibilidad_aula INT PRIMARY KEY AUTO_INCREMENT,
        periodo_aula VARCHAR(50) NOT NULL,
        id_aula INT,
        FOREIGN KEY (id_aula) REFERENCES aulas(id_aula)
    );

    CREATE TABLE IF NOT EXISTS disponibilidad_aulas_horas(
        id_disponibilidad_aula INT,
        id_hora_aula INT,
        FOREIGN KEY (id_hora_aula) REFERENCES hora_aulas(id_hora_aula),
        FOREIGN KEY (id_disponibilidad_aula) REFERENCES disponibilidad_aulas(id_disponibilidad_aula)
    );

    CREATE TABLE IF NOT EXISTS hora_profesores(
        id_hora_profesor INT PRIMARY KEY AUTO_INCREMENT,
        dia_semana INT NOT NULL,
        hora_inicio TIME NOT NULL,
        hora_fin TIME NOT NULL
    );

    CREATE TABLE IF NOT EXISTS profesores(
        id_profesor INT PRIMARY KEY AUTO_INCREMENT,
        nombre_profesor VARCHAR(50) NOT NULL,
        apellido_paterno VARCHAR(50) NOT NULL,
        apellido_materno VARCHAR(50) NOT NULL,
        email VARCHAR(100),
        telefono CHAR(10),
        grado_academico VARCHAR(10),
        area_especialidad VARCHAR(30)
    );

    CREATE TABLE IF NOT EXISTS disponibilidad_profesores(
        id_disponibilidad_profesor INT PRIMARY KEY AUTO_INCREMENT,
        id_profesor INT,
        calificacion_docente DECIMAL(4, 2),
        periodo_profesor VARCHAR(50),
        FOREIGN KEY (id_profesor) REFERENCES profesores(id_profesor)
    );

    CREATE TABLE IF NOT EXISTS disponibilidad_profesores_horas(
        id_disponibilidad_profesor INT,
        id_hora_profesor INT,
        FOREIGN KEY (id_hora_profesor) REFERENCES hora_profesores(id_hora_profesor),
        FOREIGN KEY (id_disponibilidad_profesor) REFERENCES disponibilidad_profesores(id_disponibilidad_profesor)
    );

    CREATE TABLE IF NOT EXISTS hora_horarios(
        id_hora_horario INT PRIMARY KEY AUTO_INCREMENT,
        dia_semana INT NOT NULL,
        hora_inicio TIME NOT NULL,
        hora_fin TIME NOT NULL
    );

    CREATE TABLE IF NOT EXISTS horarios(
        id_grupo INT,
        id_materia INT,
        id_profesor INT,
        id_aula INT,
        periodo_horario VARCHAR(50),
        id_hora_horario INT,
        FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo),
        FOREIGN KEY (id_materia) REFERENCES materias(id_materia),
        FOREIGN KEY (id_profesor) REFERENCES profesores(id_profesor),
        FOREIGN KEY (id_aula) REFERENCES aulas(id_aula),
        FOREIGN KEY (id_hora_horario) REFERENCES hora_horarios(id_hora_horario)
    );
