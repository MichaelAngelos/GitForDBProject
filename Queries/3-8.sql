use elidek;
select named,count(named) totalen from researcher as r join worksonproject as w on r.named=w.researchersname
where (w.projectstitle) in (
select p.title from project as p left join deliverd as d on p.title=d.projectstitle where d.title is null
)
group by named
having totalen>2
order by totalen desc;