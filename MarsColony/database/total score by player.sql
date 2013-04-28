select player_firstname, player_lastname
,sum(score_point)

from roulette_score join roulette_player on score_player_id_fk = player_id_pk

group by player_id_pk