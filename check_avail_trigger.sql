create or replace trigger borrowing
after insert or delete
on borrowings
for each row
declare 
plcopies copies.books_available%type;
begin
case 
when inserting then
if :new.isbn not in (select isbn from copies where branch_id= :new.branch_id) then
	raise_application_error(-20000,'Book not held in branch');
else
	select books_available into plcopies where branch_id=:new.Branch_Id and isbn=new.ISBN;
	if plcopies>0 then
	update copies set Books_Available:=BooksAvailable-1 where Copies.Branch_ID=:new.Branch_ID, and Copies.ISBN=:new.ISBN;
	else
	raise_application_error(-20000,'Book not available');
	end if;
when deleting then
	update copies set Books_Available:=BooksAvailable+1 where Copies.Branch_ID=:new.Branch_ID, and Copies.ISBN=:new.ISBN;
end;
/