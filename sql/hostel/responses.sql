-- exo 1
SELECT sum(capacity)
FROM rooms;

-- exo 2
SELECT COUNT(DISTINCT name) FROM guests as g INNER JOIN reservations as res ON res.guest_id=g.id WHERE res.reserved_at='1975-07-03';

-- exo 3
SELECT g.name
FROM guests AS g INNER JOIN reservations AS r ON g.id = r.guest_id
WHERE r.reserved_at = '1975-07-03';

-- exo 4

SELECT
  COUNT(res.room_id),
  g.name
FROM guests AS g INNER JOIN reservations AS res ON res.guest_id = g.id
GROUP BY g.name
HAVING (COUNT(res.room_id) > 2);