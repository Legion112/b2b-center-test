SET @timestamp18YearsAgo = UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 18 YEAR ));
SET @timestamp22YearsAgo = UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 22 YEAR ));

SELECT name, count(phone)
FROM users
    LEFT JOIN phone_numbers pn ON users.id = pn.user_id
    WHERE gender = 2
    AND birth_date <= @timestamp18YearsAgo
    AND birth_date >= @timestamp22YearsAgo
GROUP BY users.id