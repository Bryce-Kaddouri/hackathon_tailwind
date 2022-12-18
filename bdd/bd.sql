
-- rajouter la projection du numero de session pour faire le tri directement sur requete select 
CREATE OR REPLACE VIEW infotabscore as SELECT e.libelle AS equipe, COALESCE(SUM(en.nbPoints), 0) AS score
FROM equipe e
LEFT JOIN session s ON e.equipeID = s.idEquipe
LEFT JOIN validation v ON s.idEquipe = v.idEquipe
LEFT JOIN enigme en ON v.noEnigme = en.numEnigme
GROUP BY e.equipeID;