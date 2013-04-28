select player_firstname, player_lastname
,sum(cash_point)

from roulette_cash join roulette_player on cash_player_id_fk = player_id_pk

group by player_id_pk