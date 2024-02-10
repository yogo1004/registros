SELECT c.date,  firstname,lastname, name FROM users_has_services us
LEFT JOIN users u ON us.users_id = u.id
LEFT JOIN culte c ON us.culte_id = c.id
LEFT JOIN services s ON us.services_id = s.id
 WHERE c.date like "2023-02-%"
ORDER BY DATE