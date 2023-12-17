# Diccionario De Datos

Aquí tienes el diccionario de datos con descripciones añadidas a cada columna de las tablas:

Tabla "usuario":

| Campo       | Tipo        | Descripción                        | Restricciones                 |
|-------------|-------------|------------------------------------|-------------------------------|
| id_usuario  | numérico    | Identificador único del usuario     | PRIMARY KEY, AUTO_INCREMENT  |
| nombre      | texto       | Nombre del usuario                  | NOT NULL                      |
| email       | texto       | Correo electrónico del usuario      | NOT NULL                      |
| contraseña  | texto       | Contraseña del usuario              | NOT NULL                      |

Tabla "carrera":

| Campo          | Tipo        | Descripción                          | Restricciones                |
|----------------|-------------|--------------------------------------|------------------------------|
| id_carrera     | numérico    | Identificador único de la carrera    | PRIMARY KEY, AUTO_INCREMENT  |
| nombre_carrera | texto       | Nombre de la carrera                 | NOT NULL                     |
| tipo           | texto       | Tipo de la carrera                   | NOT NULL                     |
| modelo         | numérico    | Duración de la carrera               |                              |
| duracion       | numérico    | Número de grados de la carrera       |                              |

Tabla "grupos":

| Campo           | Tipo        | Descripción                                       | Restricciones                         |
|-----------------|-------------|---------------------------------------------------|---------------------------------------|
| id_grupo        | numérico    | Identificador único del grupo                     | PRIMARY KEY, AUTO_INCREMENT           |
| nombre_grupo    | texto       | Nombre del grupo                                  | NOT NULL                              |
| id_carrera      | numérico    | Identificador de la carrera a la que pertenece     | REFERENCES carrera(id_carrera)        |
| numero_estudiantes | numérico | Número de estudiantes en el grupo                  | NOT NULL                              |

Tabla "materias":

| Campo         | Tipo        | Descripción                                | Restricciones                    |
|---------------|-------------|--------------------------------------------|----------------------------------|
| id_materia    | numérico    | Identificador único de la materia           | PRIMARY KEY, AUTO_INCREMENT     |
| id_grupo      | numérico    | Identificador del grupo al que pertenece    | REFERENCES grupos(id_grupo)     |
| nombre        | texto       | Nombre de la materia                        | NOT NULL                         |
| horas_totales | numérico    | Horas totales de la materia                  | NOT NULL                         |
| hora_semanal  | numérico    | Horas semanales de la materia                | NOT NULL                         |

Tabla "hora_aula":

| Campo        | Tipo        | Descripción                           | Restricciones                |
|--------------|-------------|---------------------------------------|------------------------------|
| id_hora      | numérico    | Identificador único de la hora         | PRIMARY KEY, AUTO_INCREMENT |
| dia_semana   | numérico    | Día de la semana                       | NOT NULL                     |
| hora_inicio  | texto       | Hora de inicio de la clase              | NOT NULL                     |
| hora_fin     | texto       | Hora de fin de la clase                 | NOT NULL                     |

Tabla "aula":

| Campo        | Tipo        | Descripción                           | Restricciones                |
|--------------|-------------|---------------------------------------|------------------------------|
| id_aula      | numérico    | Identificador único del aula           | PRIMARY KEY, AUTO_INCREMENT |
| nombre_aula  | texto       | Nombre del aula                        | NOT NULL                     |
| capacidad    | numérico    | Capacidad del aula                      | NOT NULL                     |
| tipo_aula    | texto       | Tipo de aula                            | NOT NULL                     |
| edificio     | texto       | Edificio donde se encuentra el aula      | NOT NULL                     |

Tabla "disponibilidad_aulas":

| Campo                   | Tipo        | Descripción                                | Restricciones                         |
|-------------------------|-------------|--------------------------------------------|---------------------------------------|
| id_disponibilidad_aula  | numérico    | Identificador único de la disponibilidad   | PRIMARY KEY, AUTO_INCREMENT           |
| periodo_aula            | texto       | Período de disponibilidad del aula         | NOT NULL                              |
| id_hora                 | numérico    | Identificador de la hora de disponibilidad | REFERENCES hora_aula(id_hora)         |
| id_aula                 | numérico    | Identificador del aula disponible          | REFERENCES aula(id_aula)              |

Tabla "disponibilidad_aula_hora":

| Campo                  | Tipo        | Descripción                             | Restricciones                      |
|------------------------|-------------|-----------------------------------------|------------------------------------|
| id_dis_aula_hora       | numérico    | Identificador único de la disponibilidad | PRIMARY KEY, AUTO_INCREMENT        |
| id_hora                | numérico    | Identificador de la hora de disponibilidad | REFERENCES hora_aula(id_hora)      |



Tabla "hora_profe":

| Campo        | Tipo        | Descripción                            | Restricciones                |
|--------------|-------------|----------------------------------------|------------------------------|
| id_hora      | numérico    | Identificador único de la hora          | PRIMARY KEY, AUTO_INCREMENT |
| dia_semana   | numérico    | Día de la semana                        | NOT NULL                     |
| hora_inicio  | texto       | Hora de inicio de la clase               | NOT NULL                     |
| hora_fin     | texto       | Hora de fin de la clase                  | NOT NULL                     |

Tabla "profesores":

| Campo              | Tipo        | Descripción                          | Restricciones                |
|--------------------|-------------|--------------------------------------|------------------------------|
| id_profesor        | numérico    | Identificador único del profesor      | PRIMARY KEY, AUTO_INCREMENT |
| nombre_profesor    | texto       | Nombre del profesor                   | NOT NULL                     |
| apellido_paterno   | texto       | Apellido paterno del profesor          | NOT NULL                     |
| apellido_materno   | texto       | Apellido materno del profesor          | NOT NULL                     |
| email              | texto       | Correo electrónico del profesor        |                              |
| telefono           | texto       | Número de teléfono del profesor        |                              |
| grado_academico    | texto       | Grado académico del profesor           |                              |
| area_especialidad  | texto       | Área de especialidad del profesor      |                              |

Tabla "disponibilidad_profesores":

| Campo                  | Tipo        | Descripción                            | Restricciones                      |
|------------------------|-------------|----------------------------------------|------------------------------------|
| id_disponibilidad_p    | numérico    | Identificador único de la disponibilidad | PRIMARY KEY, AUTO_INCREMENT        |
| id_profesor            | numérico    | Identificador del profesor              | REFERENCES profesores(id_profesor) |
| calificacion_docente   | numérico    | Calificación del docente                |                                    |
| periodo_profesor       | texto       | Período de dispon

ibilidad del profesor  |                                    |

Tabla "disponibilidad_profe_hora":

| Campo                  | Tipo        | Descripción                             | Restricciones                      |
|------------------------|-------------|-----------------------------------------|------------------------------------|
| id_dis_pro             | numérico    | Identificador único de la disponibilidad | PRIMARY KEY, AUTO_INCREMENT        |
| id_hora                | numérico    | Identificador de la hora de disponibilidad | REFERENCES hora_profe(id_hora)     |

Tabla "hora_horario":

| Campo        | Tipo        | Descripción                            | Restricciones                |
|--------------|-------------|----------------------------------------|------------------------------|
| id_hora      | numérico    | Identificador único de la hora          | PRIMARY KEY, AUTO_INCREMENT |
| dia_semana   | numérico    | Día de la semana                        | NOT NULL                     |
| hora_inicio  | texto       | Hora de inicio de la clase               | NOT NULL                     |
| hora_fin     | texto       | Hora de fin de la clase                  | NOT NULL                     |

Tabla "horario":

| Campo           | Tipo        | Descripción                                   | Restricciones                             |
|-----------------|-------------|-----------------------------------------------|-------------------------------------------|
| id_horario      | numérico    | Identificador único del horario               | PRIMARY KEY, AUTO_INCREMENT               |
| id_grupo        | numérico    | Identificador del grupo al que pertenece      | REFERENCES grupos(id_grupo)               |
| id_materia      | numérico    | Identificador de la materia                   | REFERENCES materias(id_materia)           |
| id_profesor     | numérico    | Identificador del profesor                    | REFERENCES profesores(id_profesor)         |
| id_aula         | numérico    | Identificador del aula                        | REFERENCES aula(id_aula)                   |
| periodo_horario | texto       | Período del horario                           |                                           |
| id_hora         | numérico    | Identificador de la hora del horario          | REFERENCES hora_horario(id_hora)          |

