# -*- coding: cp949 -*-
import pandas as pd
code_df = pd.read_html('http://kind.krx.co.kr/corpgeneral/corpList.do?method=download&searchType=13', header=0)[0]
code_df[u'종목코드']= code_df[u'종목코드'].map('{:06d}'.format)
code_df = code_df[[u'회사명', u'종목코드']]
code_df = code_df.rename(columns={u'회사명': 'name', u'종목코드': 'code'})

priceDic={}
namelist=code_df['name']
codelist=code_df['code']
i=0

for code in codelist:    
    item_code=code
    url = 'http://finance.naver.com/item/sise_day.nhn?code={code}'.format(code=item_code)
    df=pd.DataFrame()
    for page in range(1, 5):
        pg_url = '{url}&page={page}'.format(url=url, page=page)
        df = df.append(pd.read_html(pg_url, header=0)[0], ignore_index=True)
    pricelist=df[u'종가']
    priceDic[namelist[i]]=pricelist
    i=i+1
    
All_Price=pd.DataFrame(priceDic)
corr = All_Price.corr(method = 'pearson')

from pandas import ExcelWriter
writer = ExcelWriter('d:\CorrelationData.xlsx')
corr.to_excel(writer,'Shee1')
writer.save()
