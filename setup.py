form setuptools import setup, find_packages

setup(
    name='Smart checking attendance',
    version='1.0.0',
    packages=find_packages(),
    install_requires=[
        'opencv-contrib-python==4.1.0.25',
        'opencv-python==3.4.6.27',
        'SPI-Py==1.0',
        'numpy==1.16.2'
        'Pillow==5.4.1',
        'mysql==0.0.2',
        'mysql-connector==2.2.9',
        'mfrc522==0.0.7',
        'DateTime==4.3',
        'pandas==1.1.2',
        'dlib==19.21.0',
        'matplotlib==3.0.2',
    ],
)