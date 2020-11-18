#  pip3 install beautifulsoup4
from bs4 import BeautifulSoup
import urllib.request
import time

f = open("id.csv")
fw = open("output.txt","w")
fw1 = open("not_found.txt","w")
main_link ="https://www.snpedia.com/index.php/"
f.readline()
ids = set(f.readlines())
for id1 in ids:
    id1 = id1.strip().split("\t")[0].strip()
    link = main_link  + id1
    #print(link)
    try:
        with urllib.request.urlopen(link) as response:
            html = response.read()
        if html != '':
            soup = BeautifulSoup(html, 'html.parser')
            divs = soup.findAll("div", {"class": "aside-right"})
            for div in divs:
                tbl = div.findAll("table", {"class": "sortable"})
                if len(tbl) != 0:
                    rows = tbl[0].find_all("tr")
                    for row in rows:
                        cells = row.find_all("td")
                        if len(cells) != 0:
                            print(id1.strip(), end="\t", file=fw)
                            for col in cells:
                                print(col.get_text().strip(), end="\t", file=fw)
                            #print(file=fw)
                            divs_inner = soup.findAll("div", {"class": "mw-parser-output"})
                            set1 = []  # set()
                            for div_inner in divs_inner:
                                paras = div_inner.findAll("p")
                                for para in paras:
                                    p = para.get_text().strip()
                                    if p != '' and "PMID" in p:
                                        print(p.replace("\n","").strip(), end="\t", file=fw)
                                        set1.append(p[p.find("[PMID") + 1:p.find("]", p.find("[PMID"))].replace("\n","").strip())
                                        # set1.add(p[p.find("[PMID")+1 :p.find("]", p.find("[PMID"))])
                                print(";".join(set1), end="", file=fw)
                            print(file=fw)
                else:
                    print(id1, "tbl not found", file=fw1)
                    print(id1, "tbl not found")
    except:
        print(id1,"page not found")
        print(id1,"page not found", file=fw1)
fw.close()
fw1.close()