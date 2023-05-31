<?php
#5
/*
Если нужно просто получить ID:
SELECT department_id FROM `evaluations` WHERE value > 5 AND gender = 1;

Но мне показалось что слишком проосто.
И создал еще одну таблицу, для получения полной информации:
SELECT departments.* FROM evaluations, departments WHERE evaluations.gender = 1 AND evaluations.value > 5 AND departments.id = evaluations.department_id;
*/



#6
/*
SELECT goods.id, goods.title, tags.id
FROM tags
INNER JOIN goods_tags ON goods_tags.tag_id = tags.id
INNER JOIN goods ON goods_tags.good_id = goods.id;
 */