ALTER TABLE patients ADD peso decimal(5,2) DEFAULT 0;

ALTER TABLE patients ADD altura decimal(3,2) DEFAULT 0;

ALTER TABLE patients ADD vive tinyint(1) DEFAULT 1;

ALTER TABLE patients ADD fecha_defuncion DATE DEFAULT NULL;

ALTER TABLE patients ADD job_id INT(10) UNSIGNED NULL DEFAULT 1;

ALTER TABLE patients ADD CONSTRAINT fk_patients_jobs FOREIGN KEY (job_id) REFERENCES jobs(Id);
