set serveroutput on 
create or replace trigger books_bought is
after update
on copies
decalre
diff1 numeric(3);
diff2 numeric(3);
begin
diff1:= :new.total_books-:old.total_books;
diff2= :new.books_available-:old.books_available;
savepoint s2;
if diff1!=diff2 then
	dbms_output.put_line('Inconsistent update');
    rollback to s2;
elsif :new.total_books!=:old.total_books and :new.books_available=:old.books_available; then
	update table copies set books_available=books_available+diff1 where branch_id=:new.branch_id and isbn=:new.isbn;
end if;
end;
/