import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.common.exceptions import NoSuchElementException

driver = webdriver.Chrome()
#go to the website on chrome
driver.get("http://localhost:8888/Web%20Board%20Game/")
delay = 1

time.sleep(delay)

link=driver.find_element(By.PARTIAL_LINK_TEXT,"Login")
link.click()
time.sleep(delay)
textbox = driver.find_element(By.NAME,"user_email")
textbox.send_keys("test@gmail.com")
time.sleep(delay)
textbox = driver.find_element(By.NAME,"user_password")
textbox.send_keys("testpass")
time.sleep(delay)
submitbutton = driver.find_element(By.CSS_SELECTOR,"input[type='submit']")
submitbutton.click()
time.sleep(delay)
link=driver.find_element(By.PARTIAL_LINK_TEXT,"Create Game")
link.click()
time.sleep(delay)
link=driver.find_element(By.PARTIAL_LINK_TEXT,"Continue")
link.click()
time.sleep(delay)
radio=driver.find_element(By.ID,"15")
radio.click()
time.sleep(delay)
submitbutton = driver.find_element(By.CSS_SELECTOR,"input[type='submit']")
submitbutton.click()
time.sleep(delay)
radio=driver.find_element(By.ID,"lightblue")
radio.click()
time.sleep(delay)
submitbutton = driver.find_element(By.CSS_SELECTOR,"input[type='submit']")
submitbutton.click()
time.sleep(delay)
submitbutton = driver.find_element(By.NAME,"startbutton")
submitbutton.click()
time.sleep(5)
submitbutton = driver.find_element(By.NAME,"rolldicebutton")
submitbutton.click()
time.sleep(4)
submitbutton = driver.find_element(By.NAME,"rolldicebutton")
submitbutton.click()
time.sleep(5)
#check if the player has reached the split path

splitpath = False
while(not splitpath):
    try:
        driver.find_element(By.ID, "right")
        splitpath = True
        
    except NoSuchElementException:
        submitbutton = driver.find_element(By.NAME,"rolldicebutton")
        submitbutton.click()
        time.sleep(3)
radio=driver.find_element(By.ID,"right")
radio.click()
time.sleep(3)
submitbutton = driver.find_element(By.CSS_SELECTOR,"input[type='submit'][value='Go']")
submitbutton.click()
time.sleep(3)
starspace = False
#This can cause an error if the player reaches the star space without enough coins to buy it
while(not starspace):
    try:
        driver.find_element(By.ID, "Yes")
        starspace = True
        
    except NoSuchElementException:
        submitbutton = driver.find_element(By.NAME,"rolldicebutton")
        submitbutton.click()
        time.sleep(3)
radio=driver.find_element(By.ID, "Yes")
radio.click()
time.sleep(1)
submitbutton = driver.find_element(By.CSS_SELECTOR,"input[type='submit'][value='Go']")
submitbutton.click()
time.sleep(3)

driver.quit()
