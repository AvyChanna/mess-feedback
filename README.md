# IITG Hostel Mess Rating System

## Problem Statement

Develop A Web-Based IITG hostel Mess Rating System. The System Automatically Provides Ratings For A Mess Considering The Feedbacks Of The Students(Sentiment Analysis)

Consider The Following Specifications For The System:

1. There Are Three Types Of Users
    - Student
    - Administrator
    - Mess Manager

        The Role Of These Users Are -
        1. Student
            - Provide Feedback
            - Choose Mess For The Upcoming Month
            - View Mess Ratings

        2. Administrator
            - Add/Remove Users
            - Update/Add Hostel Mess
            - Add/Remove Keywords To/From Database

        3. Mess Manager
            - View Ratings Of All Messes
            - View Message/Notice

2. For Each Month, a Student Can **Provide Feedback** For The Mess In Which He/She Is Subscribed
3. A list Of Keywords And Their Positivity/Negativity Weights Are Stored In The Database. The Keywords Of The Feedback Are Matched With These Keywords To Find Out The Rating (This Is By The System Automatically)
4. Consider The Rating To Be In A Scale Of Your Choice (Eg.-5 To 5; 0 To 10, Etc)(***We Will Choose 0 To 10***)
5. Also Fix A Set Of Keywords And Map Each Keyword To A Specific Rating Point (eg.Excellent Is Mapped To 5; worst Is Mapped To -5)
6. If Multiple Keywords Are Encountered In The Feedback, Calculate The Rating Based On The Average Of All The Rating Points Corresponding To Those Keywords.
7. The **Overall Rating Of A Mess** Is The *Average Of All The Individual Ratings Of That Mess*
8. A **monthly Report** Consisting Of The Overall Ratings Of All The Messes Needs To Be Published. This Can Be Accessed By Students And Mess Managers.
9. If The Overall Rating Of A Mess Is Poor, Then A "show Cause" Notice Would Be Sent To The Mess Manager Of That Mess.

## Further Instructions

1. This Is A Group Assignment
2. Implement The Project Assigned To Your Group
3. The System Should Be Web Based. Implement It Using PHP, MYSQL And Web Server Stack Like XAMP, WAMP, Etc.
4. Copying Is Strictly Prohibited. Any Case Of Copying Will Automatically Result In F For The Whole Course, Irrespective Of Your Performance In The Other Parts Of The Lab.
5. Each Project Carries Equal Weightage (Marks: 100)
6. Deadline Of Submission: 1st May 2019

## Our implementation

### Server Stack

1. Windows Server 2012 RC2
2. Nginx Web Server 1.15.12
3. PHP 7.3.4
4. MySQL 8.0.15

### Third Party Libraries Used

1. JQuery 3.3.1(For Bootstrap)
2. Popper.js 1.14.7(For Bootstrap)
3. Bootstrap 4.3.1
4. FontAwesome.js 5.8.1-All-WebFont (Optional)
5. Clipboard.js 2.0.4(Optional)

### Analysis And Design

- [ ] Data Models
- [ ] FrontEnd Design
- [ ] BackEnd Design