
from selenium import webdriver
import time
link = 'https://www.yotube.com/watch?v=4CcmG3Yn9hc'
views = int(input("10"))
view_time = int(input("3"))

browser1 = webdriver.Chrome()
browser2 = webdriver.Chrome()
browser1.get(links[170])
l = browser1.find_element_by_tag_name('body')
l.send_keys("k") #pause/play

browser2.get(links[170])

l = browser1.find_element_by_tag_name('body')
l.send_keys("k") #pause/play

for i in range(views):
    browser1.get(link)
    browser2.get(link)
    time.sleep(view_time)
    
browser1.close()
browser2.close()
