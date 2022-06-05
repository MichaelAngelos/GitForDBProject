use elidek ;
select named, count(named) totalprojects from(select r.named,w.projectstitle from researcher as r join worksonproject as w on r.named=w.researchersname where r.birtday>'1982-01-01') as s
where (projectstitle) in (
select distinct p.title from worksonproject as w join project as p on w.projectstitle=p.title and p.ended<>'0000-00-00'
)
group by named
order by totalprojects desc
limit 6;