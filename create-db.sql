CREATE DATABASE telefonDB; 

use telefonDB; 

CREATE TABLE telefonkatalog (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    fornavn VARCHAR(255), 
    etternavn VARCHAR(255), 
    telefonnummer VARCHAR(11)
    ); 