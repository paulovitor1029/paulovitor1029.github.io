Create database agenda38; 
use agenda38; 

CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    nome VARCHAR(60), 
    email VARCHAR(60) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_expiracao DATE  
); 

CREATE TABLE pagamentos (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    status ENUM('pago', 'pendente') NOT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

select * from usuarios;    
select * from pagamentos;










INSERT INTO pagamentos (usuario_id, status, data) 
VALUES (1, 'pago', NOW());

UPDATE usuarios 
SET data_expiracao = DATE_ADD(NOW(), INTERVAL 365 DAY) 
WHERE id = 1;



































































