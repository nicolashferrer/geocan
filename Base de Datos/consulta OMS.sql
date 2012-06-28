select * from (

select p.sexo, (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW()) - TO_DAYS(p.fecha_nacimiento)), '%Y')+0) AS edad, dir.* from patients AS p join
(select o.address_part_id,o.address_lab_id, o.patient_id from oms_registers as o GROUP BY o.patient_id) AS oms
on oms.patient_id = p.id
join addresses as dir on dir.id = COALESCE(oms.address_part_id,oms.address_lab_id)

) as consulta WHERE consulta.edad > 50 and consulta.sexo='M'