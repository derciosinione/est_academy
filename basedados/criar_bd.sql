CREATE DATABASE IF NOT EXISTS est_academy;

USE est_academy;

-- drop database est_academy;

CREATE TABLE IF NOT EXISTS Profiles(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(20) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsStaff BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS Users (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Username VARCHAR(30) UNICODE DEFAULT NULL,
    Nif varchar(20) UNIQUE DEFAULT NULL,
    Email VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(20),
    AvatarUrl TEXT DEFAULT NULL,
    BirthDay DATE DEFAULT NULL,
    PasswordHash TEXT,
    IsApproved BOOL DEFAULT FALSE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    ProfileId INT,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (ProfileId) REFERENCES Profiles(Id) ON DELETE RESTRICT
);


CREATE TABLE IF NOT EXISTS Categories(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    CreatorId INT,
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE SET NULL
);


CREATE TABLE IF NOT EXISTS Courses(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50),
    Price DECIMAL(11,2) DEFAULT 0,
    MaxStudent INT DEFAULT 30,
    Description TEXT,
    CategoryId INT,
    CreatorId INT,
    ImageUrl TEXT DEFAULT 'coursebg.png',
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    UNIQUE (Name, CreatorId),
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE RESTRICT,
    FOREIGN KEY (CategoryId) REFERENCES Categories(Id) ON DELETE RESTRICT
);


CREATE TABLE IF NOT EXISTS EnrollmentsStatus(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    CreatorId INT,
    FOREIGN KEY (CreatorId) REFERENCES Users(Id) ON DELETE SET NULL
);


CREATE TABLE IF NOT EXISTS StudentEnrollments(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    StudentId INT,
    CourseId INT,
    EnrollmentsStatusId INT,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (StudentId) REFERENCES Users(Id) ON DELETE RESTRICT,
    FOREIGN KEY (CourseId) REFERENCES Courses(Id) ON DELETE RESTRICT,
    FOREIGN KEY (EnrollmentsStatusId) REFERENCES EnrollmentsStatus(Id) ON DELETE RESTRICT
);


/*
CREATE TABLE IF NOT EXISTS Class(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    CourseId INT,
    TeacherId INT,
    Code VARCHAR(40) UNIQUE,
    IsActive BOOL DEFAULT FALSE,
    IsDeleted BOOL DEFAULT FALSE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (CourseId) REFERENCES Courses(Id) ON DELETE RESTRICT,
    FOREIGN KEY (TeacherId) REFERENCES Users(Id) ON DELETE SET NULL
);


CREATE TABLE IF NOT EXISTS StudentClass(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    ClassId INT,
    StudentEnrollmentId INT UNIQUE,
    CreatedAt DATETIME DEFAULT NOW(),
    UpdatedAt DATETIME DEFAULT NOW(),
    FOREIGN KEY (StudentEnrollmentId) REFERENCES StudentEnrollments(Id),
    FOREIGN KEY (ClassId) REFERENCES Class(Id)
);
*/


-- PROFILES
INSERT INTO Profiles (Name, IsActive, IsStaff, IsDeleted, CreatedAt, UpdatedAt) VALUES
('Aluno', TRUE, FALSE, FALSE, NOW(), NOW()),
('Docente', TRUE, TRUE, FALSE, NOW(), NOW()),
('Administrador', TRUE, TRUE, FALSE, NOW(), NOW());


-- USERS


INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('João Aluno', 'joao.aluno@email.com', 'senha_aluno', TRUE, TRUE, FALSE, 1, NOW(), NOW());

INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('Maria Docente', 'maria.docente@email.com', 'senha_docente', TRUE, TRUE, FALSE, 2, NOW(), NOW());


INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('Dercio Sinione', 'dercio.sinione@email.com', 'senha_admin', TRUE, TRUE, FALSE, 3, NOW(), NOW());

INSERT INTO Users (Name, Email, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt) VALUES
('Carlos Administrador', 'carlos.admin@email.com', 'senha_admin', TRUE, TRUE, FALSE, 3, NOW(), NOW());

-- ALUNOS

INSERT INTO Users (Name, Email, PhoneNumber, AvatarUrl, BirthDay, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt)
VALUES
('Maria Silva', 'maria.silva@example.com', '+55123456789', NULL, '1995-07-15', 'senha123', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('João Santos', 'joao.santos@example.com', '+55234567890', NULL, '1998-02-20', 'senha456', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Carla Almeida', 'carla.almeida@example.com', '+55345678901', NULL, '1994-09-10', 'senha789', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Pedro Lima', 'pedro.lima@example.com', '+55456789012', NULL, '1997-05-25', 'senhaabc', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Ana Rodrigues', 'ana.rodrigues@example.com', '+55567890123', NULL, '1996-11-30', 'senhadef', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Rafaela Oliveira', 'rafaela.oliveira@example.com', '+55678901234', NULL, '1993-04-05', 'senha123', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Fernando Costa', 'fernando.costa@example.com', '+55789012345', NULL, '1992-08-12', 'senha456', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Gustavo Pereira', 'gustavo.pereira@example.com', '+55890123456', NULL, '1999-01-18', 'senha789', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Patrícia Silva', 'patricia.silva@example.com', '+55901234567', NULL, '1991-03-22', 'senhaabc', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Mariana Santos', 'mariana.santos@example.com', '+55123123456', NULL, '1990-06-14', 'senhadef', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Bruno Almeida', 'bruno.almeida@example.com', '+55234343434', NULL, '1994-12-07', 'senha123', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Beatriz Lima', 'beatriz.lima@example.com', '+55345454545', NULL, '1995-08-09', 'senha456', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Rodrigo Rodrigues', 'rodrigo.rodrigues@example.com', '+55456565656', NULL, '1996-02-03', 'senha789', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Sara Oliveira', 'sara.oliveira@example.com', '+55567676767', NULL, '1997-10-26', 'senhaabc', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Juliana Costa', 'juliana.costa@example.com', '+55678787878', NULL, '1998-07-31', 'senhadef', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Lucas Pereira', 'lucas.pereira@example.com', '+55789898989', NULL, '1999-04-17', 'senha123', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Amanda Silva', 'amanda.silva@example.com', '+55898989898', NULL, '1990-11-23', 'senha456', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Roberto Santos', 'roberto.santos@example.com', '+55987878787', NULL, '1991-09-08', 'senha789', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Renata Almeida', 'renata.almeida@example.com', '+55123123123', NULL, '1992-05-01', 'senhaabc', TRUE, TRUE, FALSE, 1, NOW(), NOW()),
('Marcelo Lima', 'marcelo.lima@example.com', '+55234343434', NULL, '1993-08-14', 'senhadef', TRUE, TRUE, FALSE, 1, NOW(), NOW());


INSERT INTO Categories (Name, IsActive, IsDeleted, CreatorId, CreatedAt, UpdatedAt) VALUES
('Diversos', TRUE, FALSE, 3, NOW(), NOW()),
('História', TRUE, FALSE, 3, NOW(), NOW()),
('Programação', TRUE, FALSE, 3, NOW(), NOW()),
('Robótica', TRUE, FALSE, 3, NOW(), NOW()),
('Gestão', TRUE, FALSE, 3, NOW(), NOW()),
('Matemática', TRUE, FALSE, 3, NOW(), NOW()),
('Desenvolvimento Web', TRUE, FALSE, 3, NOW(), NOW()),
('Banco de Dados', TRUE, FALSE, 3, NOW(), NOW()),
('Segurança da Informação', TRUE, FALSE, 3, NOW(), NOW()),
('Ciência de Dados', TRUE, FALSE, 3, NOW(), NOW()),
('Cloud Computing', TRUE, FALSE, 3, NOW(), NOW()),
('Sistemas Operacionais', TRUE, FALSE, 3, NOW(), NOW()),
('Desenvolvimento de Aplicativos Móveis', TRUE, FALSE, 3, NOW(), NOW());


INSERT INTO Courses (Name, MaxStudent, CategoryId, CreatorId, IsActive, IsDeleted, CreatedAt, UpdatedAt)
VALUES
('Introdução à Fotografia', 20, 1, 3, TRUE, FALSE, NOW(), NOW()),
('Arte Moderna: História e Técnicas', 25, 1, 3, TRUE, FALSE, NOW(), NOW()),
('Hobbies Criativos: Pintura e Desenho', 15, 1, 3, TRUE, FALSE, NOW(), NOW()),
('História Mundial: da Antiguidade ao Século XX', 30, 2, 3, TRUE, FALSE, NOW(), NOW()),
('A História do Brasil Contada por seus Monumentos', 25, 2, 3, TRUE, FALSE, NOW(), NOW()),
('Grandes Civilizações Antigas', 20, 2, 3, TRUE, FALSE, NOW(), NOW()),
('Introdução ao Desenvolvimento Web', 25, 3, 3, TRUE, FALSE, NOW(), NOW()),
('Python para Iniciantes', 30, 3, 3, TRUE, FALSE, NOW(), NOW()),
('JavaScript Avançado: Fundamentos e Práticas', 20, 3, 3, TRUE, FALSE, NOW(), NOW()),
('Iniciação à Robótica com Arduino', 15, 4, 3, TRUE, FALSE, NOW(), NOW()),
('Robótica Industrial: Automação e Controle', 20, 4, 3, TRUE, FALSE, NOW(), NOW()),
('Inteligência Artificial em Robótica', 15, 4, 3, TRUE, FALSE, NOW(), NOW()),
('Gestão de Projetos: Fundamentos e Práticas', 30, 5, 3, TRUE, FALSE, NOW(), NOW()),
('Liderança e Tomada de Decisão', 25, 5, 3, TRUE, FALSE, NOW(), NOW()),
('Administração Financeira', 20, 5, 3, TRUE, FALSE, NOW(), NOW()),
('Álgebra Linear', 30, 6, 3, TRUE, FALSE, NOW(), NOW()),
('Cálculo Diferencial e Integral', 25, 6, 3, TRUE, FALSE, NOW(), NOW()),
('Estatística Aplicada', 20, 6, 3, TRUE, FALSE, NOW(), NOW()),
('HTML5 e CSS3: Construindo Páginas Web', 25, 7, 3, TRUE, FALSE, NOW(), NOW()),
('JavaScript Avançado: Frameworks e Bibliotecas', 20, 7, 3, TRUE, FALSE, NOW(), NOW()),
('PHP para Desenvolvimento Web', 20, 7, 3, TRUE, FALSE, NOW(), NOW()),
('Introdução ao MySQL', 25, 8, 3, TRUE, FALSE, NOW(), NOW()),
('Modelagem de Dados com SQL', 20, 8, 3, TRUE, FALSE, NOW(), NOW()),
('Administração de Bancos de Dados', 20, 8, 3, TRUE, FALSE, NOW(), NOW()),
('Fundamentos de Segurança Cibernética', 30, 9, 3, TRUE, FALSE, NOW(), NOW()),
('Ethical Hacking e Teste de Invasão', 25, 9, 3, TRUE, FALSE, NOW(), NOW()),
('Criptografia e Segurança de Redes', 20, 9, 3, TRUE, FALSE, NOW(), NOW());


INSERT INTO EnrollmentsStatus (Name, IsActive, IsDeleted, CreatorId, CreatedAt, UpdatedAt)
VALUES
('Pendente', TRUE, FALSE, 3, NOW(), NOW()),
('Aprovado', TRUE, FALSE, 3, NOW(), NOW()),
('Recusado', TRUE, FALSE, 3, NOW(), NOW()),
('Cancelado', TRUE, FALSE, 3, NOW(), NOW());

-- Inscrições para o curso "Introdução à Fotografia"
INSERT INTO StudentEnrollments (StudentId, CourseId, EnrollmentsStatusId, IsDeleted, CreatedAt, UpdatedAt)
VALUES
(1, 1, 1, FALSE, NOW(), NOW()), -- Maria Silva inscrita em "Introdução à Fotografia"
(2, 1, 1, FALSE, NOW(), NOW()), -- João Santos inscrito em "Introdução à Fotografia"
(3, 1, 1, FALSE, NOW(), NOW()); -- Carla Almeida inscrita em "Introdução à Fotografia"

-- Inscrições para o curso "Arte Moderna: História e Técnicas"
INSERT INTO StudentEnrollments (StudentId, CourseId, EnrollmentsStatusId, IsDeleted, CreatedAt, UpdatedAt)
VALUES
(4, 2, 1, FALSE, NOW(), NOW()), -- Pedro Lima inscrito em "Arte Moderna: História e Técnicas"
(5, 2, 1, FALSE, NOW(), NOW()), -- Ana Rodrigues inscrita em "Arte Moderna: História e Técnicas"
(6, 2, 1, FALSE, NOW(), NOW()); -- Rafaela Oliveira inscrita em "Arte Moderna: História e Técnicas"


-- Inscrições para o curso "Hobbies Criativos: Pintura e Desenho"
INSERT INTO StudentEnrollments (StudentId, CourseId, EnrollmentsStatusId, IsDeleted, CreatedAt, UpdatedAt)
VALUES
(7, 3, 1, FALSE, NOW(), NOW()), -- Fernando Costa inscrito em "Hobbies Criativos: Pintura e Desenho"
(8, 3, 1, FALSE, NOW(), NOW()), -- Gustavo Pereira inscrito em "Hobbies Criativos: Pintura e Desenho"
(9, 3, 1, FALSE, NOW(), NOW()); -- Patrícia Silva inscrita em "Hobbies Criativos: Pintura e Desenho"


-- Inscrições para o curso "História Mundial: da Antiguidade ao Século XX"
INSERT INTO StudentEnrollments (StudentId, CourseId, EnrollmentsStatusId, IsDeleted, CreatedAt, UpdatedAt)
VALUES
(10, 4, 1, FALSE, NOW(), NOW()), -- Mariana Santos inscrita em "História Mundial: da Antiguidade ao Século XX"
(11, 4, 1, FALSE, NOW(), NOW()), -- Bruno Almeida inscrito em "História Mundial: da Antiguidade ao Século XX"
(12, 4, 1, FALSE, NOW(), NOW()); -- Beatriz Lima inscrita em "História Mundial: da Antiguidade ao Século XX"


-- Inscrições para o curso "A História do Brasil Contada por seus Monumentos"
INSERT INTO StudentEnrollments (StudentId, CourseId, EnrollmentsStatusId, IsDeleted, CreatedAt, UpdatedAt)
VALUES
(13, 5, 1, FALSE, NOW(), NOW()), -- Rodrigo Rodrigues inscrito em "A História do Brasil Contada por seus Monumentos"
(14, 5, 1, FALSE, NOW(), NOW()), -- Sara Oliveira inscrita em "A História do Brasil Contada por seus Monumentos"
(15, 5, 1, FALSE, NOW(), NOW()); -- Juliana Costa inscrita em "A História do Brasil Contada por seus Monumentos"


-- Inscrições para o curso "Grandes Civilizações Antigas"
INSERT INTO StudentEnrollments (StudentId, CourseId, EnrollmentsStatusId, IsDeleted, CreatedAt, UpdatedAt)
VALUES
(16, 6, 1, FALSE, NOW(), NOW()), -- Lucas Pereira inscrito em "Grandes Civilizações Antigas"
(17, 6, 1, FALSE, NOW(), NOW()), -- Amanda Silva inscrita em "Grandes Civilizações Antigas"
(18, 6, 1, FALSE, NOW(), NOW()); -- Roberto Santos inscrito em "Grandes Civilizações Antigas"

UPDATE Users SET PasswordHash='123456' WHERE Id!=0;

INSERT INTO Users (Name, Email, PhoneNumber, AvatarUrl, BirthDay, PasswordHash, IsApproved, IsActive, IsDeleted, ProfileId, CreatedAt, UpdatedAt)
VALUES
    ('admin', 'admin', '+55123123123', NULL, '1992-05-01', 'admin', TRUE, TRUE, FALSE, 3, NOW(), NOW()),
    ('docente', 'docente', '+55123123312', NULL, '1992-05-01', 'docente', TRUE, TRUE, FALSE, 2, NOW(), NOW()),
    ('aluno', 'aluno', '+551231232', NULL, '1992-05-01', 'aluno', TRUE, TRUE, FALSE, 1, NOW(), NOW());


UPDATE Users SET AvatarUrl='studentavatar.jpg' WHERE ProfileId=1;

UPDATE Users SET AvatarUrl='docent-avatar.jpg' WHERE ProfileId in (2,3);

UPDATE Users SET IsApproved=FALSE WHERE ProfileId=1 AND Id IN (23,20,18,15);

UPDATE Users SET Email='derciosinione@gmail.com',Username='derciosionione', Nif='85125554', PhoneNumber='3232423', BirthDay='2000/03/01' WHERE Id=3;
