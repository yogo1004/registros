SELECT s.name, u.firstname,u.lastname FROM users_has_services us
LEFT JOIN users u ON u.id = us.users_id
JOIN culte c ON c.id = us.culte_id
LEFT JOIN services s ON s.id = us.services_id
WHERE c.date = '2022-03-23'