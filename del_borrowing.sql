create or replace trigger del_borrowing
before delete
on borrowings
for each row
begin
update copies set Books_Available:=BooksAvailable+1 where Copies.Branch_ID=:new.Branch_ID, and Copies.ISBN=:new.ISBN;
end;
/