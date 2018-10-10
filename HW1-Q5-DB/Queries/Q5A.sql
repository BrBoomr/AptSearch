SELECT DISTINCT employee_name
FROM (employee NATURAL JOIN works) NATURAL JOIN company
WHERE company_name = 'First Bank Corporation';