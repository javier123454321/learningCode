import os
import requests
import urllib.request
import time
import getpass
from bs4 import BeautifulSoup
from datetime import date

def send_email_to(sender, receiver, smtp, username, password, subject, body):
    """
    A function to call the sendEmail cmd prompt that takes in the necessary parameters and turns them to proper cli
    """
    cmd_script = "sendEmail -f %s  -t %s -s %s -xu %s -xp %s -u %s -o message-file=%s" % (sender, receiver, smtp, username, password, subject, body)
    print("sending email to %s" % receiver)
    try:
        os.system(cmd_script)
        print("%s sent to %s" % (subject, receiver))
    except OSError:
        print("Email not sent")
    return

def get_url_html(URL):
    """
    gets the html data of a specific URL
    """
    response = requests.get(URL, timeout=15)
    html_content = response.text
    print("website html found")
    return html_content

def get_table_data(html_content):
    """
    **formatted for the AIA job website**
    finds the new job postings in the aia website, returns a list of lists. Each item in the outermost list has 3 items: Job name, Location, and Date Posted.
    """
    soup = BeautifulSoup(html_content, "html.parser")
    list_of_jobs = []
    print("checking for jobs")
    for i in soup.find_all('tr'):

        # Formatting the table data to get the text value, and put each item as an element of the list
        text_values = i.text
        text_values = text_values.split('\n')
        text_values = text_values[1:-1]

        # Had to parse each string to find the link inside of it, I am sure there is a beautiful soup function that does this somehow
        # but I could not for the life of me get it to work
        link = ""

        if 'a href="' in str(i):
            starting_link_text = str(i).find('a href="') + 8
            ending_link_text = str(i)[starting_link_text:].find('"') +starting_link_text
            link = str(i)[starting_link_text:ending_link_text]

        # Wanted to the append the link as the last element of the list of text values
        if len(link) > 0:
            text_values.append(link)

        list_of_jobs.append(text_values)

    return list_of_jobs

def send_todays_jobs(list_of_jobs, *subject):
    """
    goes through a list of jobs and checks whether there are any jobs for today.
    """
    today = date.today()
    string_date = today.strftime("%B %d, %Y")
    todays_jobs = []
    print("getting today's jobs")
    for i in range(len(list_of_jobs)):
        date_posted = list_of_jobs[i][2]
        if string_date in date_posted:
            todays_jobs.append(list_of_jobs[i])


    if len(todays_jobs) > 0:
        print("New jobs found!")
        send_jobs_to_mail(todays_jobs, subject)
    else:
        print("no new jobs found")
    return todays_jobs


def send_jobs_to_mail(list_of_jobs, *subject):
    """
    receives a list of jobs and sends it to my email from my email
    """
    # create a file to write the list of jobs to
    directory = os.path.dirname(os.path.realpath(__file__))
    body_file = open((directory + "\\jobs.txt"), "w")

    # Write the items in the list to the file in an order, adding the list item number first and putting each item in a new line
    body = ""
    for i in range(len(list_of_jobs)):


        body = body + str(i)

        for j in range(4):
            try:
                body = body + " " + list_of_jobs[i][j]
            except IndexError:
                pass
        body = body +"\n\n"
    body_file.write(body + "\n")
    body_file.close()

    print("\n\n\n\n\nThe program will write an email to yourself with today's jobs as posted in the AIA Chicago website")
    print("As of now it only works for gmail")
    print("You might have to check your gmail security settings to allow a mail transfer protocol from the command line\n\n")

    mailto = input("type your email address please: ")
    pword = getpass.getpass(prompt='type your password for gmail please: ')

    send_email_to(mailto, mailto, "smtp.gmail.com:587", mailto, pword, subject, (directory+"\\jobs.txt"))
    os.remove(directory+"\\jobs.txt")



html_content = get_url_html("https://www.aiachicago.org/resources/jobs/")
job_info = get_table_data(html_content)

option = input("type 1 for all jobs or 2 for only today's jobs\n")
if option=='1':
    send_jobs_to_mail(job_info, 'AIA Chicago list of jobs')
elif option =='2':
    todays_jobs = send_todays_jobs(job_info,"AIA Chicago today's jobs")
