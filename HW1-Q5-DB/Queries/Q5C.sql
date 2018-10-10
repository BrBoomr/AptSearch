SELECT DISTINCT employee_name, street, city, salary
FROM (employee NATURAL JOIN works) NATURAL JOIN company
WHERE company_name = 'First Bank Corporation'
AND salary>10000;