 --Quantidade de alunos que receberam benefício em 2011:
SELECT COUNT(DISTINCT p.codpes)
FROM PESSOA p
JOIN BENEFICIOALUCONCEDIDO bac
ON p.codpes = bac.codpes
WHERE bac.dtainiccd LIKE '%2011%'