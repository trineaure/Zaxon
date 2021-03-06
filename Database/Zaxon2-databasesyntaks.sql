USE Zaxon2
GO

CREATE TABLE Member
(
Membership_number int IDENTITY(10001,1),
First_name nvarchar(40) NOT NULL,
Last_name nvarchar(60) NOT NULL,
Birth date NOT NULL,
Phone_Number varchar(30) NOT NULL,
Login_Password nvarchar(30) NOT NULL,

CONSTRAINT MemberPK PRIMARY KEY (Membership_number)
);


CREATE TABLE Employee
(
EmployeeID int IDENTITY(1,1),
First_name nvarchar(40) NOT NULL,
Last_name nvarchar(60) NOT NULL,
Birth date NOT NULL,
Phone_Number varchar(30) NOT NULL,
Home_Address nvarchar(150) NOT NULL,
Zip_Code varchar(10) NOT NULL,
Login_Password nvarchar(30) NOT NULL,

CONSTRAINT EmployeePK PRIMARY KEY (EmployeeID)
);


CREATE TABLE Reservation
(
Reservation_number int IDENTITY(1,1),
Reservation_date date NOT NULL,
Time_of_Day time NOT NULL,
Membership_number int,
EmployeeID int,

CONSTRAINT ReservationPK PRIMARY KEY (Reservation_number),

CONSTRAINT ReservationFK FOREIGN KEY (Membership_number)
REFERENCES Member,

CONSTRAINT ReservationFK1 FOREIGN KEY (EmployeeID)
REFERENCES Employee,

);


CREATE TABLE Treatment_category
(
Category_Name nvarchar(30),

CONSTRAINT Treatment_categoryPK PRIMARY KEY (Category_Name)
);


CREATE TABLE Treatment
(
Treatment_Name nvarchar(30),
Price int,
Category_Name nvarchar(30),

CONSTRAINT TreatmentPK PRIMARY KEY (Treatment_Name),

CONSTRAINT TreatmentFK FOREIGN KEY (Category_Name)
REFERENCES Treatment_category,
);


-- Splittboks

CREATE TABLE Reservation_treatment
(
Reservation_number int,
Treatment_Name nvarchar(30),

CONSTRAINT Reservation_treatmentPK PRIMARY KEY (Reservation_number,
Treatment_Name),

CONSTRAINT Reservation_treatmentFK FOREIGN KEY (Reservation_number)
REFERENCES Reservation,

CONSTRAINT Reservation_treatmentFK1 FOREIGN KEY (Treatment_Name)
REFERENCES Treatment
);