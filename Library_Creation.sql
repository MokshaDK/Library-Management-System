drop table publisher;
drop table author;
drop table book;
drop table writtenby;
drop table borrowings;
drop table borrower;
drop table branch;


create table publisher( Publisher_Name varchar(20) primary key, Publisher_Address varchar(100) not null, Publisher_Phone numeric(10) not null, check length(Publisher_Phone)=9);

create table author( Author_ID numeric(5) primary key, Author_First_Name varchar(20) not null, Author_Last_Name varchar(20) not null);

create table book( ISBN numeric(13), Title varchar(20) not null, Publisher_Name foreign key references publisher(Publisher_Name) not null, check ISBN>=1000000000000);

create table writtenby(ISBN numeric(13) foreign key references books(ISBN), Author_ID numeric(5) foreign key references Author(Author_ID), primary key(ISBN, Author_ID));

create table borrower(Borrower_ID numeric(5) primary key, Borrower_First_Name varchar(20) not null, Borrower_Last_Name varchar(20) not null, Borrower_Address varchar(20), Borrower_Phone varchar(20) not null, Borrower_Email varchar(20), check length(Borrower_Phone)=9);

create table branch(Branch_ID varchar(5) primary key, Branch_Name varchar(20) not null, Branch_Address varchar(20) not null);

create table copies(Branch_ID varchar(5) foreign key references branch(Branch_ID), ISBN numeric(13) references book(ISBN), Total_Books numeric(3), Books_Available numeric(3) ,primary key(Bracnch_ID, ISBN));

create table borrowings(Borrower_Id numeric(5) foreign key references borrower(Borrower_ID), ISBN numeric(13) foreign key references book(ISBN), Borrowing_Date date, Due_Date date, Branch_ID varchar(5) foreign key references branch(Branch_ID), Amount_due numeric(5));



--branch table
insert into branch values(1, 'Manipal Library', 'Udupi Highway, Eshwar Nagar, Manipal');
insert into branch values(3, 'Mangalore Library', 'Bejai Main Rd, Lalbagh, Mangalore');
insert into branch values(2, 'Karkala Library', 'Market Road, Karkala, Udupi');

--borrower table
insert into borrower values(1101,'Anna','Maria','ND Sankalpa Rd, Manipal',185345699,'annamaria11@gmail.com');
insert into borrower values(1102,'Jerome','Davidson','Tellar Rd, Karkala',364654978,'jdave@hotmail.com');
insert into borrower values(1103,'Lisa','Green','Ganesh Baug Rd, Manipal',023447629,'liGreen234@gmail.com');
insert into borrower values(1104,'Bill','Jonas','Vidya Nagar Rd, Mangalore',419439045,null);
insert into borrower values(1105,'Selena','Rader','Bishop Victor Rd, Mangalore',765425765,null);

--author table
insert into author values(111, 'Scott Fitzgerald');
insert into author values(112, 'Jane Austen);'
insert into author values(113, 'William Shakespeare');
insert into author values(114, 'Lewis Carroll');

--publisher table
insert into publisher values('Charles Scribners Sons','153–157 Fifth Avenue, New York City',734288923);
insert into publisher values('Simon & Schuster', 'New York, NY, 10020-1513', 643923472);
insert into publisher values('Dover Publications','1325 Franklin Ave, Garden City, NY', 894623479);
insert into publisher values('Penguin Classics', ' City of Westminster, London, England', 835582962);

--book table
insert into book values(9780743273565, 'The Great Gatsby', 'Charles Scribner's Sons');
insert into book values(9780451530783, 'Pride and Prejudice','Simon & Schuster');
insert into book values(9781451669411, 'Hamlet', 'Simon & Schuster');
insert into book values(9780486275437,'Alice Adventures in Wonderland','Dover Publications');
insert into book values(9780141439662, 'Sense and Sensibility', 'Penguin Classics');

--writtenby table
insert into written by values(9780743273565, 111);
insert into written by values(9780451530783,112);
insert into written by values(9781451669411,113);
insert into written by values(9780486275437,114);
insert into written by values(9780141439662, 112);

--copies table
insert into copies values(1,9780743273565, 5);
insert into copies values(2,9780743273565, 8);
insert into copies values(1,9780451530783, 12);
insert into copies values(2,9780451530783, 8);
insert into copies values(3, 9780451530783, 11);
insert into copies values(1,9781451669411, 17);
insert into copies values(2,9781451669411, 14);
insert into copies values(3,9781451669411, 6);
insert into copies values(2,9780486275437, 11);
insert into copies values(3,9780486275437, 12);
insert into copies values(1,9780141439662, 16);
insert into copies values(2,9780141439662,14);
insert into copies values(3,9780141439662, 18);