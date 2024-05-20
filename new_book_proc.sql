set serveroutput on;
create or replace procedure new_book is
plisbn book.isbn%type;
pltitle Book.book_title%type;
plpub publisher.publisher_name%type;
plcopies copies.total_books%type;
plbranch branch.Branch_ID%type;
plauth author.Author_ID%type;
begin
dbms_output.put_line('Enter ISBN, book title, author id, publisher name, library branch id, number of copies');
plisbn:='&isbn';
pltitle:='&title';
plauth:='&author';
plpub='&pub';
plbranch='&branch';
pl_copies='&copies';
if plauth not in (select author_id from author) then
dbms_output.put_line('Author not found- Enter author's name: ');
insert into author values(plauth, '&name');
end if;
if plpub not in (select publisher_name from publisher) then
dbms_output.put_line('Publisher not found- Enter publisher's address and phone: ');
insert into publisher values(plpub, '&addr', '&phone');
end if;
insert into book values(plisbn, pltitle, plpub);
insert into copies values(plbranch, plisbn, plcopies, plcopies);
insert into writtenby(plisbn, plauth); 
end;
/