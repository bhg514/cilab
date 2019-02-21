<?php
header("content-type:text/html; charset=utf-8");
include '../header.php';
if (isset($_SESSION['user_id'])) {
    header("location:https://" . $http_host . "/index.php");
}
?>
<section class="container">
    <div class="visual etc">
        <p class="subTitle">Sing up</p>
        <div class="location">
            <img src="../images/common/icon_home.png" alt="Home"> <span>&gt;</span>
            <span>Membership</span>
        </div>
    </div>
    <div class="contents">
        <div class="tabletInner">
            <form action="form.php" method="post">
                <p class="blt01">Terms of Membership</p>
                <p class="fs14 avt">
                    <span class="fcR">(Required)</span>Site Terms and Conditions
                </p>
                <textarea class="term">Standard Clauses of E-Commerce (Internet Cybermall)

Standard Clauses No. 10023 (Amended on June 26th, 2015)

Clause 1 (Purpose) The purpose of these clauses is to define rights, duties and responsibilities of the cybermall and its users for the use of the Internet-related services (to be referred to as “Services” from now on) provided by CILab Cybermall (to be referred to as “Mall” from now on) which is operated by CILab (the operator of e-commerce).

* [These clauses are also applied to the type of e-commerce which is involved with PC and wireless communications as long as they are not against the properties.]

Clause 2 (Definitions)

1. “Mall” is the virtual place of business established by CILab with the goal of providing its users with goods or services (to be referred to as “Goods etc.”) in order to let them trade “Goods etc.”  by using such information and communication tools as computers. Also, it can represent the operator which runs the cybermall.

2. “Users” are the members or non-members that get themselves connected to “Mall” and receive the services provided by “Mall” according to these clauses.

3. “Members” are those that get themselves registered to “Mall” as members and can constantly use the services provided by “Mall”.

4. “Non-members” are those that use the services provided by “Mall” without getting themselves registered as members.

Clause 3 (Specification, Description & Amendment of Clauses)

1. “Mall” posts the contents of these clauses and such information as the name of the representative, the address of the place where the business office is located (including the address of the place that can handle consumers’ complaints), telephone number/fax number/e-mail address, business registration number, telemarketing business registration number and the manager in charge of personal information on the initial service screen (full-screen) of CILab Cybermall in order to let the users easily find them out. However, the contents of the clauses can be notified to the users through the connecting screen.

2. “Mall” must have users’ confirmation by providing them with a separate connecting screen or a pop-up screen in order to help them understand such important contents as the withdrawal of agreements/the delivery responsibilities/the conditions for refunds among those specified in the clauses prior to their agreement to them.

3. “Mall” can amend these clauses within the range that does not violate such related acts as [E-Commerce Consumer Protection Act], [Clause Regulation Act], [Electronic Document & E-Commerce Fundamental Act], [Electronic Financial Transaction Act], [Electronic Signature Act], [Information Network Use Promotion & Information Protection Act], [Call Sales Act] and [Consumer Framework Act].

4. “Mall” specifies and posts the date of application and the reasons for the amendment of these clauses on the initial screen of “Mall” together with the current clauses from 7 days before the date of application to the day before. However, when the contents of the clauses are amended disadvantageously for the users, the information must be posted with the grace period of more than 30 days at least. In such a case, “Mall” must clearly compare the contents before and after the amendment and let the users easily find them out.

5. When “Mall” amends the clauses, the amended clauses are only applied to the agreements which are concluded after the date of application. For the agreements concluded before, the terms and conditions of the clauses before the amendment are applied as they are. However, if the users that already have agreements want to be subject to the application of the amended clauses, they must let “Mall” know about their intention by sending it to “Mall” and getting its approval within the notice period for the amendment of the clauses based on Section 3. 

6. For anything that is not specified in these clauses and the interpretation of these clauses, it is required to follow such acts as [E-Commerce Consumer Protection Act], [Clause Regulation Act] and [E-Commerce Consumer Protection Guidelines] in addition to subordinate statutes and commercial practices.

Clause 4 (Provision & Change of Services)

1. “Mall” executes the following duties.

    <1> Provision of information about goods or services and conclusion of purchase agreements
    <2> Delivery of goods or services related to the conclusion of purchase agreements
    <3> Other duties set by “Mall”

2. “Mall” can change the contents of goods or services which it provides based on the agreements to be concluded in the future when the quality of goods or services or technical specifications are changed. In such a case, the contents of the changed goods or services and the date of provision must be specified and immediately posted on the same place where the contents of the current goods or services are posted.

3. When changing the contents of the services subject to the conclusion of the agreements with users based on such a reason as the change of the quality or technical specifications of goods or services, “Mall” must immediately notify the users of the reason through a possible address.

4. Regarding the previous section, “Mall” must compensate users for any loss which consumers get from it. However, if “Mall” proves that there is no intention or negligence, there will be no need for such compensation.

Clause 5 (Suspension of Services)

1. “Mall” can temporarily stop providing services in such cases as repair and maintenance, replacement and failure of information and communication tools and suspension of communication.

2. “Mall” must compensate users or any third party for any loss which they get from the temporary suspension of services based on Section 1. However, if “Mall” proves that there is no intention of negligence, there will be no need for compensation.

3. When it is no longer possible to provide services due to such reasons as the change of business items, the abandonment of businesses and the integration of companies, “Mall” must notify users of such suspension of services based on the method set by Clause 8 and compensate consumers according to the terms and conditions set by “Mall” in the beginning. However, if “Mall” has not notified users of the standard for compensation, users’ mileage or saved money can be given to them in the form of goods which can be used as currency on “Mall” or cash.

Clause 6 (Membership Registration)

1. Users can apply for membership registration by filling in the information form based on the registration process and showing their approval for the clauses.

2. “Mall” register the users that apply for membership through the process mentioned in Section 1 as members unless they are subject to the following sections.

    <1> When the users applying for membership have lost their membership before based on Section 3 of Clause 7 (However, those that are approved for their application for membership by “Mall” 3 years after losing their previous membership based on Section 3 of Clause 7 can be exempted.)
    <2> When there are false information, omitted contents and miswriting about the contents of registration

    <3> When there are other reasons to believe that it is hard to carry out the membership registration process due to the noticeable technical problem experienced by “Mall” 

3. The membership registration agreement is concluded when the approval of “Mall” reaches members.

4. When there is any change to the contents registered for membership, members must notify “Mall” of such a change by correcting membership information within a reasonable period.

Clause 7 (Membership Withdrawal & Disqualification)

1. Members can provide “Mall” with their request for withdrawal at any time. “Mall” must immediately carry out such a request.

2. When members are subject to one of the following cases, “Mall” can restrict and suspend membership.

    <1> When members write false contents during the membership registration process
    <2> When members fail to make the payment for the goods which they buy from “Mall” or fulfill their financial obligations for the use of “Mall”
    <3> When members threatens the e-commerce order by preventing others from using “Mall” or illegally using others’ information
    <4> When members violate these clauses or any statute or good public order and customs by using “Mall”

3. When the same action for the membership restriction or suspension is carried out more than twice or the cause of such restriction or suspension is not corrected within 30 days after “Mall” restricts or suspends membership, “Mall” can withdraw the membership.

4. When “Mall” withdraws membership, the registration of membership is erased. In such a case, the membership withdrawal process must be notified to the subject members. Also, the members must be provided with their chances to defend themselves within the period of more than 30 days at least before the registration of membership is erased.

Clause 8 (Notices to Members)

1. When “Mall” sends notices to members, such notices can be sent to the e-mail addresses set in advance between members and “Mall” based on the agreement.

2. In case of the notices to be sent to many unspecified members, “Mall” can post the notices on the noticeboard of “Mall” for more than 1 week instead of sending individual notices. However, regarding any matter that is important in relation to the agreement with members, “Mall” must send individual notices.

Clause 9 (Purchase Application & Approval for the Provision of Personal Information)

1. Users of “Mall” carry out the purchase application process by using the following methods or any other similar method on “Mall”, while “Mall” must help users to easily understand each method in the purchase application process.

    <1> Search and selection of goods
    <2> Input of names, addresses, telephone numbers and e-mail addresses (or cellular phone numbers) for those who receive goods
    <3> Confirmation of the contents of clauses, the services subject to the restriction of the right to withdrawal from the agreement and the contents related to the financial obligations such as delivery charges and installation fees
    <4> Indication of the approval of these clauses or the confirmation or refusal of Section 3 (e.g., mouse clicks)
    <5> Purchase application of goods and confirmation about the purchase application or approval for the confirmation by “Mall”
    <6> Selection of the payment method

2. When it is required for “Mall” to provide any third party with buyers’ personal information, (1) the party that receives the information, (2) the purpose of the party receiving the personal information for the use of such information, (3) the items of personal information provided, and (4) the period of possessing and using such personal information by the party that receives it must be notified to the purchasers and their approval must be obtained in advance. (The same thing is applied when the items subject to approval are changed.)

3. When “Mall” consigns work to the third party to deal with buyers’ personal information, it is required to notify buyers of (1) the party to which the work to deal with personal information is consigned and (2) the contents of the work dealing with personal information and get their approval. (The same thing is applied when the items subject to approval are changed.) However, when it is necessary for the execution of the agreement related to the provision of services or when it is related to the improvement of buyers’ convenience, it is possible not to go through the notice procedure and get approval by notifying buyers through the method to deal with personal information set in [Information and Communication Network Use Facilitation & Information Protection Act].

Clause 10 (Conclusion of Agreement)

1. “Mall” may not consent to the purchase application mentioned in Clause 9 if it is subject to the following sections. However, when entering into agreements with minors, it is required to notify them of the fact that they or their legal representatives can cancel the agreements if they fail to obtain approval from their legal representatives.

    <1> When there are false information, omitted contents and miswriting about the contents of application
    <2> When minors purchase such goods and services as cigarettes and alcoholic beverages which are prohibited by Juvenile Protection Act
    <3> When it is believed that to approve the purchase application could clearly interrupt “Mall” in a technical way

2. It is thought that agreements are concluded when the approval of “Mall” reaches users in the notice form of receipt confirmation shown in Section 1 of Clause 12.

3. The indication of approval by “Mall” must include the information related to the confirmation of users’ purchase applications and the possibility for sales and the cancellation of purchase applications.

Clause 11 (Payment Method) The payment for any good or service purchased from “Mall” can be made through the following methods. However, “Mall” cannot add any commission for any reason to the payment to be made by users for the goods which they purchase.

    <1> Account transfers made through phone banking, Internet banking or e-mail banking
    <2> Card settlements made through pre-paid cards, debit cards or credit cards
    <3> Online deposit without a bankbook
    <4> Settlements made with digital money
    <5> Payments made on receipt
    <6> Settlements made with mileage points given by “Mall”
    <7> Settlements made with gift certificates which are approved by “Mall”
    <8> Payments made with other electronic payment methods

Clause 12 (Receipt Confirmation Notice/Purchase Application, Change & Cancellation)

1. When there is a purchase application made by a user, “Mall” sends a receipt confirmation notice to the user.

2. If there is any nonconforming matter about the indication of his or her intention after having the receipt confirmation notice, the user can immediately change or cancel the purchase application. When there is a request from the user prior to the delivery, “Mall” must fulfill that request without any hesitation. However, if the payment has already been made, it is required to follow such a regulation as the one mentioned in Clause 15 about the withdrawal of agreements.

Clause 13 (Provision of Goods)

1. As long as there is no separate agreement with users regarding the time when goods must be provided, “Mall” executes every necessary process to manufacture and pack goods in order to deliver them within 7 days from the conclusion of the agreement with each user. However, if “Mall” has already received all or some of the payment for the goods, it is required to carry out the delivery process within 3 business days from the day when all or some of the payment is made. In such a case, “Mall” must help users to check on the delivery procedure of goods.

2. “Mall” must specify the delivery method for the goods purchased by users, the party responsible for the delivery charge made in each method and the delivery period required for each method. If “Mall” fails to deliver goods within the promised delivery period, it is required to compensate users for any loss which they are faced with. However, if “Mall” can prove that there is no intention or negligence, there is no need for such a compensation.

Clause 14 (Refund) If it is impossible to deliver or provide the goods subject to users’ purchase applications because they are out of stock, “Mall” must notify users of such a reason without any hesitation. If the payment for such goods has already been made, it is required to refund the money or execute every necessary process within 3 days from the day when the payment is made.

Clause 15 (Withdrawal of Agreements)

1. The users who have entered into agreements with “Mall” for the purchase of goods can withdraw their agreements within 7 days from the day when they receive documents about the contents of the agreements (or the day when goods are delivered or leave “Mall” in the case of the delivery of goods being made later than the day of receiving documents) based on Section 2 of Clause 13 in [E-Commerce Consumer Protection Act]. However, if there is any other regulation related to the withdrawal of agreements in [E-Commerce Consumer Protection Act], it is required to follow it.

2. After receiving goods, users cannot ask for the return or change of those goods in the following cases.

    <1> When goods are destroyed or damaged by users (however, in the case of damaging the package in order to check the contents, it is possible to withdraw agreements.)
    <2> When the values of goods have clearly been diminished due to users’ using or partially consuming them
    <3> When the values of goods have clearly been diminished due to the amount of time spent making it impossible to sell them again
    <4> When the package of the original goods whose duplications can be made with the same functions has been damaged

3. In case of Subsection 2 or 4 of Section 2, if “Mall” has failed to specify the fact that the advanced withdrawal of agreements is restricted and post it in any place for consumers’ easy understanding or has not carried out the necessary process to provide them with trial goods, users’ withdrawal of agreements is not restricted.

4. Despite the regulations stated in Section 1 and Section 2, when the contents of the goods are different from what is indicated or advertised or when there is anything different regarding the execution of the agreements, users can withdraw the agreements within 30 days from the day when such a fact is known or possibly known.

Clause 16 (Withdrawal Effect of Agreements)

1. After receiving goods from users, “Mall” must refund the payment which it has already received within 3 business days. In such a case, if “Mall” fails to refund the payment to users on time, it is required to calculate a delay interest by applying the delay interest rate stated in Section 2 of Clause 12 in [E-Commerce Consumer Protection Enforcement Ordinance] and pay it to users. 

2. If the payment for the goods has been made in such settlement methods as credit cards and digital money, “Mall” must ask the operators of such methods for the suspension or cancellation of the claim for the payment without any hesitation when making a refund.

3. In case of the withdrawal of agreements, users must be responsible for the charge necessary to return the goods received. “Mall” does not ask users for any cancellation charge or compensation related to the withdrawal of agreements. However, when the withdrawal of agreements is made because the contents of the goods are different from what is indicated or advertised or the whole process is carried out differently from what is in the agreements, “Mall” is responsible for the charge necessary to return the goods.

4. If users have paid for the charge related to the delivery of the goods, “Mall” must clearly indicate the party responsible for the payment when agreements are withdrawn for users’ easy understanding.

Clause 17 (Personal Information Protection)

1. “Mall” collects the minimum amount of personal information within the necessary range in order to provide services when collecting users’ personal information.

2. “Mall” does not collect the information necessary for the execution of the purchase agreement in advance during the membership registration process. However, it is not so when the minimum amount of specific personal information is collected for the purpose of identification prior to the purchase agreement in order to execute obligations based on the related ordinance.

3. “Mall” must notify users of the purpose of collecting and using their personal information and get their approval.

4. “Mall” cannot use the collected personal information for any other purpose. If there is any new purpose for the use of the collected personal information or such information is to be provided to the third party, it is required to notify users of the purpose during the process of using or providing such information and get their approval. However, if there is a separate regulation related to such a process, exceptions can be made.

5. When “Mall” must get users’ approval in regard to Section 2 and Section 3, it is required to specify or notify them of the matters defined by Section 2 of Clause 22 in [Information and Communication Network Use Facilitation & Information Protection Act] such as the identity of the person in charge of the personal information management (the department, the name and the telephone number along with other contact numbers), the purposes for the collection and use of such information and the matters related to the provision of information to the third party (the party receiving the information, the purpose of providing such information and the contents of the information to be provided). Also, users can always withdraw their approval at any time.

6. Users can always ask for reading and correcting errors of their personal information obtained by “Mall”, while “Mall” is responsible for carrying out every necessary action to do so without any hesitation. When users ask for correcting errors, “Mall” must not use their personal information until such errors are corrected.

7. “Mall” must limit the number of people dealing with users’ personal information to the minimum in order to protect personal information. Also, “Mall” is responsible for any damage caused to users due to the loss, theft, exposure, provision to the third party without consent or falsification of users’ personal information including that of credit cards and bank accounts.

8. “Mall” or the third party receiving personal information from “Mall” must destroy the personal information without any hesitation once the purpose for collecting or receiving such personal information is achieved.

9. “Mall” is not thought to have chosen the column for consent regarding the collection, use and provision of personal information. Also, it is required to clearly specify the services that can be restricted when users do not approve the collection, use and provision of their personal information. “Mall” must not restrict or refuse the provision of such services as those related to membership because of users not providing their approval for the collection, use and provision of personal information other than the essential collection items.

Clause 18 (Duties of “Mall”)

1. “Mall” must not carry out any action that is prohibited by these clauses or against good public order and customs. Also, “Mall” must try its best to constantly and steadily provide goods and services based on the regulations set by these clauses.

2. “Mall” must have the security system for the protection of users’ personal information (including the credit information) in order to let users use Internet services safely.

3. “Mall” is responsible for any damage encountered by users due to its unreasonable indication or advertisement of goods or services as stated in Clause 3 in [Indication and Advertisement Fairness Act].

4. “Mall” must not send advertisement e-mail messages for profit to users if they do not want them.

Clause 19 (Duties for Users’ Ids and Passwords)

1. Members are responsible for managing their IDs and passwords except for the cases stated in Clause 17.

2. Members must not let the third party use their IDs and passwords.

3. When members realize that their IDs and passwords have been stolen or are being used by the third party, they must immediately notify “Mall” of such a case and follow the guidelines provided by “Mall”.

Clause 20 (Users’ Duties) Users must not carry out the following actions.

    <1> Registering false contents during the application or changing process
    <2> Stealing others’ information
    <3> Changing information posted on “Mall”
    <4> Transmitting or posting the information (including computer programs) other than the one stated by “Mall”
    <5> Violating intellectual property rights including those of “Mall” and the third party
    <6> Damaging the honor of “Mall” and the third party or interrupting their businesses
    <7> Revealing or posting pornographic or violent messages, video clips and voices or anything that is against good public order and customs

Clause 21 (Relationship between Connecting “Mall” and Connected “Mall”)

1. When the upper-class “Mall” and the lower-class “Mall” are connected to each other through hyperlink methods (e.g., the subjects of hyperlinks include texts, pictures and video clips), the former one is regarded as Connecting “Mall” (website) while the latter one is considered to be Connected “Mall” (website).

2. When Connecting “Mall” specifies the fact that it does not have any responsibility of a surety for the transactions made by users for the goods independently provided by Connected “Mall” through the initial screen of Connecting “Mall” or a pop-up screen at the point of connection, Connecting “Mall” does not have any responsibility of a surety for such transactions.

Clause 22 (Ownership of Copyrights & Prohibition of Use)

1. The copyrights or other intellectual property rights for the work made by “Mall” belong to “Mall”.

2. Users must not use the information about which “Mall” has the related intellectual property rights for profit through such methods as duplication, transmission, publication and broadcasting or let the third party use it without the advanced consent of “Mall” after they get it by using “Mall”. 

3. When using the copyrights belonging to users, “Mall” must notify users of it based on these clauses.

Clause 23 (Conflict Resolution)

1. “Mall” establishes and operates an organization responsible which is in charge of handling compensations for losses in order to reflect the reasonable opinions or complaints brought up by users and compensate for the related losses.

2. “Mall” must preferentially deal with the complaints or opinions submitted by users. However, if it is difficult to rapidly deal with such matters, it is required for “Mall” to immediately notify users of the reasons for delay and the schedule for handling them in the future.

3. If users apply for damage relief regarding the e-commerce conflicts which they face with “Mall”, it is possible to follow the resolution provided by Fair Trade Commission or the conflict resolution organization requested by the major or the provincial governor.

Clause 24 (Jurisdiction & Governing Law)

1. The lawsuit for the e-commerce conflict between “Mall” and users is to be carried out in the place where the subject user is located at the time when the lawsuit is brought up. If no address is known, the exclusive jurisdiction area of the district court in charge becomes the place where the lawsuit is carried out. However, if users’ addresses are not clear or located abroad at the time when the lawsuit is brought up, the competent court for the civil procedure has its jurisdiction.

2. Korean laws are applied to the lawsuit related to e-commerce transactions between “Mall” and users.
</textarea>
                <div class="agreeArea">
                    <div class="radio_chk">
                        <label class="fs14"><input type="radio" name="agree1" value="y"> Agree</label>
                        <label class="fs14 ml10"><input type="radio" name="agree1"
                            value="n"> Disagree</label>
                    </div>
                </div>
                <p class="blt01">Consent to the collection and use of articles 15 and 24 of the Personal Information Protection Act</p>
                <p class="fs14 avt">
                    <span class="fcR">(Required)</span>Privacy Policy
                </p>
                <textarea class="term">Privacy Policy

This Policy (the "Policy") explains the way of treatment of the information which is provided or collected in the web sites on which this Policy is posted. Through this Policy, the Company regards personal information of the users as important and inform them of the purpose and method of Company's using the personal information provided by the users and the measures taken by the Company for protection of those personal information.

1. Information to be collected and method of collection

(1) Personal information items to be collected

Personal information items to be collected by the Company are as follows:

• Information provided by the users

The Company may collect the information directly provided by the users.

- Internet membership service

 ∘ Name, email address, ID, telephone number, address, national information, encoded identification information (CI), identification information of overlapped membership (DI)
  ∘ For minors, information of legal representatives (name, birth date, CI and DI of legal representatives)

- Online payment service

  ∘ Name, address, telephone number, and email address
  ∘ Payment information including account number and card number
  ∘ Delivery information including delivery address, name and contact information of recipient
  ∘ Information of bid, purchase and sales

- Social network service

∘ Name, email address, ID, telephone number, address, national information, address list (acquaintance)
  
• Information collected while the users use services

Besides of information directly provided by the users, the Company may collect information in

the course that the users use the service provided by the Company.

- Equipment information
∘ Equipment identifier, operation system, hardware version, equipment set-up, type and set-up of browser, use information of website or application and telephone number

- Log information
∘ IP address, log data, use time, search word input by users, internet protocol address, cookie and web beacon

- Location information
∘ Information of device location including specific geographical location detected through GPS , Bluetooth or Wifi (limited to the region permissible under the laws)
                                              
- Other information
∘ Preference, advertisement environment, visited pages regarding service use of users

(2) Method of collection

The Company collects the information of users in a way of the followings:

• webpage, written form, fax, telephone calling, e-mailing, tools for collection of created information
• provided by partner companies

2. Use of collected information

The Company uses the collected information of users for the following purposes:

• Member management and identification

• To detect and deter unauthorized or fraudulent use of or abuse of the Service

• Performance of contract, service fee payment and service fee settlement regarding provision of services demanded by the users

• Improvement of existing services and development of new services

• Making notice of function of company sites or applications or matters on policy change

• To help you connect with other users you already know and, with your permission, allow other users to connect with you

• To make statistics on member’s service usage, to provide services and place advertisements based on statistical characteristics

• To provide information on promotional events as well as opportunity to participate

• To comply with applicable laws or legal obligation

• Use of information with prior consent of the users (for example, utilization of marketing advertisement)

The Company agrees that it will obtain a consent from the users, if the Company desires to use the information other than those expressly stated in this Policy.

3. Disclosure of collected information

Except for the following cases, the Company will not disclose personal information with a 3rd party:

• when the Company disclosing the information with its affiliates, partners and service providers;

   - When the Company's affiliates, partners and service providers carry out services such as bill payment, execution of orders, products delivery and dispute resolution (including disputes on payment and delivery) for and on behalf of the Company

• when the users consent to disclose in advance;

   - when the user selects to be provided by the information of products and services of certain        companies by sharing his or her personal information with those companies

   - when the user selects to allow his or her personal information to be shared with the sites or platform of other companies such as social networking sites

   - other cases where the user gives prior consent for sharing his or her personal information

• when disclosure is required by the laws:

   - if required to be disclosed by the laws and regulations; or

   - if required to be disclosed by the investigative agencies for detecting crimes in accordance with the procedure and method as prescribed in the laws and regulations

4. Cookies, Beacons and Similar Technologies


The Company may collect collective and impersonal information through 'cookies' or 'web beacons'.


Cookies are very small text files to be sent to the browser of the users by the server used for operation of the websites of the Company and will be stored in hard-disks of the users' computer.

Web beacon is a small quantity of code which exists on the websites and e-mails. By using web beacons, we may know whether an user has interacted with certain webs or the contents of email.

These functions are used for evaluating, improving services and setting-up users' experiences so that much improved services can be provided by the Company to the users

The items of cookies to be collected by the Company and the purpose of such collection are as follows:

- strictly necessary cookies
This cookie is a kind of indispensible cookie for the users to use the functions of website of the Company. Unless the users allow this cookie, the services such as shopping cart or electronic bill payment cannot be provided. This cookie does not collect any information which may be used for marketing or memorizing the sites visited by the users 
 ∘ Memorize the information entered in an order form while searching other pages during web browser session
   ∘ For the page of products and check-out, memorize ordered services
   ∘ Check whether login is made on website
   ∘ Check whether the users are connected with correct services of the website of the Company while the Company changes the way of operating its website
   ∘ Connect the users with certain application or server of the services

- performance cookies
This cookie collects information how the users use the website of the Company such as the information of the pages which are visited by the users most. This data helps the Company to optimize its website so that the users can search that website more comfortably. 
This cookie does not collect any information who are the users. Any and all the information collected by this cookie will be processed collectively and the anonymity will be guaranteed.
   ∘ Web analysis: provide statistical data on the ways of using website
   ∘ Management of error: measure an error which may occur so as to give a help for improving website
   ∘ Design testing: test other design of the website of Company

- functionality cookies
  This cookie is used for memorizing the set-ups so that the Company provides services and improves visit of users. Any information collected by this cookie do not identify the users individually.
   ∘ Memorize set-ups applied such as layout, text size, basic set-up and colors
   ∘ Memorize when the customer respond to a survey conducted by the Company

The users have an option for cookie installation. So, they may either allow all cookies by setting option in web browser, make each cookie checked whenever it is saved, or refuses all cookies to be saved: Provided that, if the user rejects the installation of cookies, it may be difficult for that user to use the parts of services provided by the Company.

5. User’s right

The users or their legal representatives, as main agents of the information, may exercise the following rights regarding the collection, use and sharing of personal information by the Company:

• exercise right to access to personal information;
• make corrections or deletion;
• make temporary suspension of treatment of personal information; or
• request the withdrawal of their consent provided before

If, in order to exercise the above rights, you, as an user, use the menu of 'amendment of member information of webpage or contact the Company by sending a document or e-mails, or using telephone to the company(or person in charge of management of personal information or a deputy), the Company will take measures without delay: Provided that the Company may reject the request of you only to the extent that there exists either proper cause as prescribed in the laws or equivalent cause.

6. Security

The Company regard the security of personal information of uses as very important. The company constructs the following security measures to protect the users' personal information from any unauthorized access, release, use or modification

 • Encryption of personal information

    - Transmit users' personal information by using encrypted communication zone
    - Store important information such as passwords after encrypting it

• Countermeasures against hacking

    - Install a system in the zone the external access to which is controlled so as to prevent leakage or damage of users' personal information by hacking or computer virus

• Establish and execute internal management plan
• Install and operate access control system
• Take measures to prevent forging or alteration of access record

7. Protection of personal information of children

In principle, the Company does not collect any information from the children under 13 or equivalent minimum age as prescribed in the laws in relevant jurisdiction. The website, products and services of the Company are the ones to be provided to ordinary people, in principle. The website or application of the Company has function to do age limit so that children cannot use it and the Company does not intentionally collect any personal information from children through that function.
(Additional procedure for collecting personal information from children) However, if the Company collects any personal information from children under 13 or equivalent minimum age as prescribed in the laws in relevant jurisdiction for the services for unavoidable reason, the Company will go through the additional procedure of the followings for protecting that personal information of children:• verify, to the extent that efforts are reasonably made, whether they are children of the age at which consent from their guardian is required and the consenting person is an authorized one.

• obtain consent from the parents or guardian of children so as to collect personal information of children or directly send the information of products and services of the Company

• give the parents or guardian of children a notice of Company's policy of privacy protection for children including the items, purpose and sharing of personal information collected

• grant to legal representatives of children a right to access to personal information of that children/correction or deletion of personal information/temporary suspension of treatment of personal information/ and request for withdrawal of their consent provided before

• limit the amount of personal information exceeding those necessary for participation in online activities

8. Modification of Privacy Protection Policy

The Company has the right to amend or modify this Policy from time to time and, in such case, the Company will make a public notice of it through bulletin board of its website (or through individual notice such as written document, fax or e-mail) and obtain consent from the users if required by relevant laws.

9. Contact information of Company

Please use one of the following methods to contact the Company should you have any queries in respect to this policy or wish to update your information:

• Company name : CiLab

  Address : Youngsan Univ. Yangsan Campus 50510, Cultural Center 3405, 288 Junam-ro(Junam-dong), Yangsan-si, Gyeongnam-do, Korea

  Tel.: +82 055-785-0710

  E-mail: donghyuk@cilab.kr

(Add the following if designated of data protection officer) The Company designates the following Data Protection Officer (DPO) in order to protect personal information of customers and deal with complaints from customers.

• DPO of the Company: Dong-Hyuk, LEE

Adress: Youngsan Univ. Yangsan Campus 50510, Cultural Center 3405, 288 Junam-ro(Junam-dong), Yangsan-si, Gyeongnam-do, Korea

Tel.: +82 055-785-0710

E-mail: donghyuk@cilab.kr

10. Guide for users residing in Korea

The Company guides several additional matters to be disclosed as required by the information network laws and personal information protection laws in the Republic of Korea as follows:

(1) Period for retention and use of personal information

In principle, the Company destructs personal information of users without delay when: the purpose of its collection and use has been achieved; the legal or management needs are satisfied; or users request: Provided that, if it is required to retain the information by relevant laws and regulations, the Company will retain member information for certain period as designated by relevant laws and regulations. The information to be retained as required by relevant laws and regulations are as follows:

∘ Record regarding contract or withdrawal of subscription: 5 years (The Act on Consumer Protection in Electronic Commerce )
 ∘ Record on payment and supply of goods:5 years (The Act on Consumer Protection in Electronic Commerce )
 ∘ Record on consumer complaint or dispute treatment: 3 years (The Act on Consumer Protection in Electronic Commerce )
 ∘ Record on collection/process, and use of credit information: 3 years (The Act on Use and Protection of Credit Information )
 ∘ Record on sign/advertisement: 6 months(The Act on Consumer Protection in Electronic Commerce )
 ∘ Log record of users such as internet/data detecting the place of user connection: 3 months(The Protection of Communications Secrets Act )
 ∘ Other data for checking communication facts: 12 months (The Protection of Communications Secrets Act )

(2) Procedure and method of destruction of personal information

In principle, the Company destructs the information immediately after the purposes of its collection and use have been achieved without delay: Provided that, if any information is to be retained as required by relevant laws and regulations, the Company retain it for the period as required by those laws and regulations before destruction and, in such event, the personal information which is stored and managed separately will never be used for other purposes. The Company destructs: hard copies of personal information by shredding with a pulverizer or incinerating it; and delete personal information stored in the form of electric file by using technological method making that information not restored.

(3) Technical, managerial and physical measures for protection of personal information In order to prevent the loss, theft, leakage, alteration or damage of personal information of the users, the Company takes technical, managerial and physical measures for securing safety as follows:

- Technical
 
∘ Utilize security servers for transmitting encryption of personal information
 ∘ Take measures of encryption for confidential information
 ∘ Install and operate access control devices and equipments
 ∘ Establish and execute internal management plan

- Managerial measures

∘ Appoint a staff responsible for protecting personal information
∘ Provide education and training for staffs treating personal information
∘ Establish and execute internal management plan
∘ Establish rules for writing passwords which is hard to be estimated
∘ Ensure safe storage of record of access to personal information processing system
∘ Classify the level of authority to access to personal information processing system

- Physical measures

∘ Establish and operate the procedure for access control for the facilities for storing personal information
∘ Store documents and backing storage containing personal information in safe places which have locking device


(4) Staff responsible for managing personal information

The staff of the Company responsible for managing personal information is as follows:

• Name of staff responsible for managing personal information: Dong-Hyuk, LEE

  Dept. : CiLab

  Tel. : +82 055-785-0710
                                       
  Contact : donghyuk@cilab.kr

</textarea>
                <div class="agreeArea">
                    <div class="radio_chk">
                        <label class="fs14"><input type="radio" name="agree2" value="y"> Agree</label>
                        <label class="fs14 ml10"><input type="radio" name="agree2"
                            value="n"> Disagree</label>
                    </div>
                </div>
                <div class="mt20 ar">
                    <input type="submit" name="submit"
                        class="btn_submit btn type07 st2" value="Membership"
                        OnClick="return fregister_submit()"> <a href="/"
                        class="btn type07">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</section>
<script>
    function fregister_submit(f) {
        var agree1_val = $('input[name="agree1"]:checked').val();
        var agree2_val = $('input[name="agree2"]:checked').val();
        if(agree1_val == 'y' && agree2_val == 'y'){
            return true;
        }else if(agree1_val != 'y'){
            alert("You have to agree the terms of membership to sign up the membership.");                          
            return false;
        }else if(agree2_val != 'y'){
            alert("You have to agree the privacy policy to sign up the membership.");
            return false;
        }
        
    }
</script>
<?php
include '../footer.php'?>