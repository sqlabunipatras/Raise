FROM --platform=linux/amd64 mono:6.8
# FROM mono:6.8
RUN  apt-get update \
  && apt-get install -y wget \
  && apt-get install -y unzip 
RUN wget http://metaverseink.com/download/diva-r09110.zip
RUN unzip diva-r09110.zip
COPY MyWorld.ini /diva-r09110/bin/config-include/MyWorld.ini
COPY RegionConfig.ini /diva-r09110/bin/Regions/RegionConfig.ini
COPY OpenSim.ini /diva-r09110/bin/OpenSim.ini
COPY orange-planets-background.jpg /diva-r09110/bin/WifiPages/images/orange-planets-background.jpg
# COPY backup /diva-r09110/bin/backup
EXPOSE 9003/udp
EXPOSE 9003/tcp
WORKDIR /diva-r09110/bin
# CMD [ "mono",  "./OpenSim.exe" ]
#CMD env LANG=C mono OpenSim.exe
CMD env LANG=C mono OpenSim.exe -console=rest