from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time
driver = webdriver.Chrome()
driver.get("https://www.google.es/maps/search/libro")
boton = WebDriverWait(driver, 10).until(EC.presence_of_element_located((
    By.XPATH, "/html/body/c-wiz/div/div/div/div[2]/div[1]/div[3]/div[1]/div[1]/form[2]/div/div/button")))
boton.click()
# results = WebDriverWait(driver, 30).until(
#     EC.presence_of_element_located((
#     By.CSS_SELECTOR, ".PLbyfe > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) > a:nth-child(1)")))
time.sleep(2)
results = driver.find_elements(By.XPATH, "/html/body/div/div/div/div/div/div/div/div/div/div/div/div/div/div/div/div/a")

for result in results:
    print(result.get_dom_attribute("href"))
